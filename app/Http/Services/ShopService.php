<?php

namespace App\Http\Services;

use App\{ Product, Category };
use Sunra\PhpSimple\HtmlDomParser;
use Storage;

class ShopService
{
    public function excel($rows)
    {
        ini_set('max_execution_time', 300);
        
        $products = [];
        $categories = [];

        $n = sizeof($rows);
        for ($i = 11; $i < $n; $i++) {
            if ($rows[$i][3] > 0) {
                for ($j = $i; $j < $n; $j++) {
                    if ($rows[$j][3] == null) {
                        break;
                    }    
                }
                $products[] = [$i, $j - $i];
                $i = $j - 1;
            } else if ($rows[$i][1] != null) {
                $categories[] = $i;
            }
        }
        $m = sizeof($categories);
        $powers = [];
        for ($i = 0; $i < $m; $i++) {
            $power = 0;
            for ($j = $i + 1; $j < $m; $j++) {
                if ($categories[$j] - $categories[$j - 1] > 1) break;
                $power += 1;
            }
            $powers[$categories[$i]] = $power;
        }
        for ($i = $m - 1; $i >= 0; $i--) {
            $current_level = $powers[$categories[$i]];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($powers[$categories[$j]] - $current_level == 1) {
                    $name = $rows[$categories[$i]][1];
                    $image = $categories[$j];
                    $category = Category::firstOrCreate(['name' => $name], ['image' => $image]);
                    Category::where('image', $categories[$i])->update(['parent_id' => $category->id]);
                    break;
                }
            }
            if ($i == 0) {
                $name = $rows[$categories[$i]][1];
                $image = null;
                $category = Category::firstOrCreate(['name' => $name], ['image' => $image]);
                Category::where('image', $categories[$i])->update(['parent_id' => $category->id]);
                break;
            }
        }

        foreach ($products as $product_range) {
            for ($i = 0; $i < $product_range[1]; $i++) { 
                $index = $product_range[0] + $i;
                $name = $rows[$index][1];
                $set_number = $rows[$index][2];
                $price = $rows[$index][3];
                $measure = $rows[$index][4];
                $category_id = Category::where('name', $rows[$product_range[0] - 1][1])->first()->id;
                Product::updateOrCreate(['name' => $name], ['set_number' => $set_number, 'new_price' => $price, 'measure' => $measure, 'category_id' => $category_id]);
            }
        }
    }

    public function parse()
    {
        ini_set('max_execution_time', -1);
        $products = Product::where('id', '>', 1)->where('short_description', null)->get();
        foreach ($products as $product) {
            try {
                $dom = HtmlDomParser::file_get_html('https://ekt.kz/catalog/?q='. urlencode($product->name), false, null, 0);   
            } catch (\Exception $e) {
                sleep(2);
                continue;
            }
            // similar_text($product->name, 'АВВГ 2х2,5')
            $similar = [];
            if ($dom == false) continue;
            foreach ($dom->find('.product-card-out-catalog') as $index => $link) {
                if ($index > 11) break;
                if (sizeof($link->find('.product-title')) > 0) {
                    $a = $link->find('.product-title')[0];
                    $similar[$index] = similar_text($product->name, $a->innertext);
                } else {
                    continue;
                }
            }
            if (sizeof($similar) == 0) continue;
            arsort($similar);
            $link = $dom->find('.product-card-out-catalog')[array_key_first($similar)];
            $a = $link->find('.product-title')[0]->parent()->find('a')[0]->href;

            $dom = HtmlDomParser::file_get_html('https://ekt.kz'. $a, false, null, 0);
            $short_description = '';
            if (sizeof($dom->find('.product-table')) > 0) {
                foreach ($dom->find('.product-table')[0]->find('.row') as $key_1 => $row) {
                    if (trim($row->plaintext) != 'Все характеристики') {
                        $short_description .= $row->outertext;
                    }
                }
            }
            $long_description = '';
            if (sizeof($dom->find('.product-content')) > 0) {
                $long_description = $dom->find('.product-content')[0]->innertext;
            }
            $image = '';
            $name = '';
            if (sizeof($dom->find('.product-image img')) > 0) {
                $image = $dom->find('.product-image img')[0]->src;
                $contents = file_get_contents('https://ekt.kz'.$image);
                
                $size = getimagesize('https://ekt.kz'.$image);
                $extension = image_type_to_extension($size[2]);

                $name = md5(now()) .$extension;
                Storage::put('public/products/'. $name, $contents);
            }
            Product::where('id', $product->id)->update([
                'short_description' => $short_description,
                'long_description' => $long_description,
                'image' => 'products/'. $name. '?last='.$product->image
            ]);
            // sleep(2);
        }
    }
}