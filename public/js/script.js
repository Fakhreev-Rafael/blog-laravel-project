(function() {

    // show-hide password input 
    let checkboxes = document.querySelectorAll('.form-checkbox-password');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function(event) {
            // if the checkbox does not have a "data-for" attribute
            if(!this.hasAttribute('data-for'))
            {
                throw Error('The "data-for" attribute not found');
            }

            // Getting "data-for" attribute from checkbox what has the name of the input
            let id = this.getAttribute('data-for');
            // Getting input by id
            let input = document.getElementById(id);

            // if the checkbox was checked
            if(this.checked)
            {
                input.setAttribute('type', 'text');
            
            } else
            {
                input.setAttribute('type', 'password');
            }

        });
    });

})();