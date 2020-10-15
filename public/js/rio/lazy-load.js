
var lazyLoadInstances = [];

var initOneLazyLoad = function (horizContainerElement) {
    // When the .horizContainer element enters the viewport,
    // instantiate a new LazyLoad on the horizContainerElement
    var oneLL = new LazyLoad({

    });
    // Optionally push it in the lazyLoadInstances
    // array to keep track of the instances
    lazyLoadInstances.push(oneLL);
};

// The "lazyLazy" instance of lazyload is used to check
// when the .horizContainer divs enter the viewport
var lazyLazy = new LazyLoad({
    elements_selector: ".horizContainer",
    callback_enter: initOneLazyLoad,
    unobserve_entered: true // Stop observing .horizContainer(s) after they entered
});
