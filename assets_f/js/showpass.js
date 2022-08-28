!function($){
    "use strict";
     var CoreApp= function(){
         this.$body = $("body"),
         this.$showPass = $('.checkPass')
     };
     
  CoreApp.prototype.activateShowPass = function (){
      var $this = this;
      var x =  document.getElementById("showPass");
      this.$showPass.on('click', function(){
        if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
      });
  }

     CoreApp.prototype.init =function(){
        this.activateShowPass();

     },
     $.CoreApp = new CoreApp, $.CoreApp.Constructor = CoreApp
}(window.jQuery),

// initializing
function ($){
     "use strict";
     $.CoreApp.init();   
}(window.jQuery);