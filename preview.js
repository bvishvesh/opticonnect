    
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) 
                {
                    $('#pre')
                        .attr('src', e.target.result)
                        .width(600)
                        .height(600);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }