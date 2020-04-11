

let responsiveHelper;
const breakpointDefinition = {
    tablet: 1024,
    phone: 480
};
let tableContainer;

jQuery(document).ready(function($)
{
    tableContainer = $("#table-1");

    tableContainer.dataTable({
        "sPaginationType": "bootstrap",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": false,


        // Responsive Settings
        bAutoWidth     : false,
        fnPreDrawCallback: function () {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
            }
        },
        fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            responsiveHelper.createExpandIcon(nRow);
        },
        fnDrawCallback : function (oSettings) {
            responsiveHelper.respond();
        }
    });

    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });





    jQuery("#createUserForm").validate({
        ignore: [],
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            dob: 'required',
            role_id: "required",
            status: "required",
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            dob: "Please provide you date fo birth",
            role_id: "Please select role",
            status: "Please select status",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
        }
    });

    jQuery("#editUserForm").validate({
        ignore: [],
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            dob: 'required',
            role_id: "required",
            status: "required"
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            dob: "Please provide you date fo birth",
            role_id: "Please select role",
            status: "Please select status"
        }
    });

    jQuery("#createPostForm").validate({
        ignore: [],
        rules: {
            title: "required",
            category_id: "required",
            body: "required"
        },
        messages: {
            title: "Please enter title",
            category_id: "Please select category",
            body: "Please enter body"
        }
    });

    jQuery("#editPostForm").validate({
        ignore: [],
        rules: {
            title: "required",
            category_id: "required",
            body: "required"
        },
        messages: {
            title: "Please enter title",
            category_id: "Please select category",
            body: "Please enter body"
        }
    });


    jQuery("#createCategoryForm").validate({
        ignore: [],
        rules: {
            name: "required",
        },
        messages: {
            name: "Please add category first!",
        }
    });

    jQuery("#editCategoryForm").validate({
        ignore: [],
        rules: {
            name: "required",
        },
        messages: {
            name: "Please add category first!",
        }
    });


    $('#options').click(function () {
        if (this.checked){
            $('.checkBoxes').each2(function () {
                this.checked = true;
            });
        }else{
            $('.checkBoxes').each2(function () {
                this.checked = false;
            });
        }
    });


});



