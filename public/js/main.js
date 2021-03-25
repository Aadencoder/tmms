  $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

   $(document).ready(function($) {
        
				$("#addTeacherModuleForm").validate({
                rules: {
                    lecturer_name: "required",                    
                    email: {
                        required: true,
                        minlength: 6
                    },
                   phone: "required",
                   address: "required",
                   dob: "required",
                   nationality_id: "required",
                   faculty_id: "required",
                   faculty_module_id: "required",
                  gender_id: "required"
                 
                },
                messages: {
                    name: "Please enter your Name",                   
                    email: {
                        required: "Please enter your email address",
                        minlength: "Your email must be at least 6 characters long"
                    },
                  phone: "Please enter your phone number",
                  nationality_id: "Please select your nationality",
                  faculty_id: "Please select your faculty",
                  faculty_module_id: "Please select your faculty module",
                  gender_id: "This field is required"
                },
                 errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
                submitHandler: function(form) {
                    form.submit();
                }
                
            });
    });

