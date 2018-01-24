(function () {

  var Input = {
    init: function () {
      this.els = document.querySelectorAll('input[data-slug-target]')
      Array.from(this.els).forEach(function (l) {
        l.addEventListener('keyup', Input.ngeSlug)

        // add event keyup on slug input
        // var inputSlug = Input.getTargetEl(l.getAttribute('data-slug-target'))
        // inputSlug.addEventListener('keypress', function (e) {
        //   // ...
        // })
      })
    },

    getTargetEl: function (selector) {
      if (selector.includes('#')) {
        return document.getElementById(selector.replace('#', ''))
      }

      return inputSlug = document.getElementByClassName(selector.replace('.', ''))
    },

    ngeSlug: function (e) {
      var el = this,
        target = this.getAttribute('data-slug-target'),
        inputSlug;

      if (target.includes('#')) {
        inputSlug = document.getElementById(target.replace('#', ''))
      } else {
        inputSlug = document.getElementByClassName(target.replace('.', ''))
      }

      inputSlug.value = Input.slugify(el.value)
      
    },

    slugify: function (text) {
      return text.toString().toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')

      // return text.toString().toLowerCase()
      //   .replace(/\s+/g, '-')           // Replace spaces with -
      //   .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
      //   .replace(/\-\-+/g, '-')         // Replace multiple - with single -
      //   .replace(/^-+/, '')             // Trim - from start of text
      //   .replace(/-+$/, '');            // Trim - from end of text
    }
  }

  Input.init()

})()