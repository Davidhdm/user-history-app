require('./bootstrap');

(function ($) {
  showSwal = function (type) {
    'use strict';
    if (type === 'claim') {
      swal({
        title: 'Done!',
        text: 'The code was claimed successfully.',
        timer: 2000,
        button: false
      })/* .then(
        function () { },
        // handling the promise rejection
        function (dismiss) {
          if (dismiss === 'timer') {
            console.log('I was closed by the timer')
          }
        }
      ) */
    }

    if (type === 'claimed') {
      swal({
        title: 'Error',
        text: 'This code has already been claimed.',
        timer: 2000,
        button: false
      })
    }

    if (type === 'get_the_code') {
      swal({
        title: 'Done!',
        text: 'You can now go to the "My promotional codes" section and claim it.',
        timer: 2000,
        button: false
      })
    }
  }
})(jQuery);
