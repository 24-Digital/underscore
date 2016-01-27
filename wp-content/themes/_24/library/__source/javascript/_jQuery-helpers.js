/* ==========================================================================
   _Jquery.js - Helpers
   ========================================================================== */

/*
* Add exists to jQuery
*
* Usage: if( $(selector).exists() ){
*     --do something
* }
*
*/

jQuery.fn.exists = function(){
    return this.length > 0;
};