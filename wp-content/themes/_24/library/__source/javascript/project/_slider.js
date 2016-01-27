/* ==========================================================================
   _fancybox.js - Fancybox specific functionality
   ========================================================================== */

_24.Modules.slider = {

    // The container for your slider
    slideContainer: '.primary-slider',

    // Check to see if the slide container exists
    init: function($){

        // Initial setups for module
        var _this            = this,
            $sliderContainer = $(_this.slideContainer);

        // If the slider exists launch the build
        if( $sliderContainer.exists() ){ _this.buildSlider($sliderContainer); }

    },

    // Build the slider using fancybox
    buildSlider: function( $el ){

        console.log('building the slider');
        console.log($el);

        // Setup the slider and add class '.show-slider' after it has loaded
        $el.flexslider({
            animation: "slide"
        });

    }

}