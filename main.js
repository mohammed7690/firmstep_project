$(document).ready(function(){
    
    $.post("Controller/FirmstepController.php", 
        { notifyVal: "Loaded" },
        function(data) {
            var arr = JSON.parse(data);
            for (var i = 0; i < arr.length; i++){
                $('#radioStacked'+(i+1)).parent().children('.custom-control-description').html(arr[i]['service']);
            }
        }
    );
    
    
    $('.identity-buttons').click(function(){
       $('.identity-buttons').removeClass('active');
       $('.form').removeClass('citizenData');
       $('.form').removeClass('organisationData');
       $('.form').removeClass('anonymousData');
        $('.firstnameDiv').removeClass('hideContent');
        $('.firstnameDiv label').html('First name');
        $('.firstnameDiv input').attr("placeholder", "First name");
        $(this).addClass('active');
        if($(this).attr('id') == 'citizen'){
            $('.titleDiv').removeClass('hideContent');
            $('.surnameDiv').removeClass('hideContent');
            $('.form').addClass('citizenData');
        }
        if($(this).attr('id') == 'organisation'){
            $('.titleDiv').addClass('hideContent');
            
            $('.firstnameDiv label').html('Name');
            $('.firstnameDiv input').attr("placeholder", "Name");
            
            $('.surnameDiv').addClass('hideContent');
            $('.form').addClass('organisationData');
        }
        if($(this).attr('id') == 'anonymous'){
            $('.titleDiv').addClass('hideContent');
            $('.firstnameDiv').addClass('hideContent');
            $('.surnameDiv').addClass('hideContent');
            $('.form').addClass('anonymousData');
        }
    });
    
    $('#form-submit').click(function(){
        if(!$('.form').hasClass('anonymousData')){
            var check = $('#firstname').val();
            if(check == ''){
                $('.firstname-validation').removeClass('hideContent');
                setTimeout(function(){
                    $('.firstname-validation').addClass('hideContent');
                },3000);
                return false;
            }
        }
        
        var identity = '';
        var title = '';
        var firstname = 'Anonymous';
        var surname = '';
        var service = $('#services input:radio:checked').parent().children('.custom-control-description').html();
        
        if($('.form').hasClass('citizenData')){
            identity = 'Citizen';
            title = $('#nameTitle').val();
            firstname = $('#firstname').val();
            surname = $('#lastname').val();
            if(surname == ''){
                $('.surname-validation').removeClass('hideContent');
                setTimeout(function(){
                    $('.surname-validation').addClass('hideContent');
                },3000);
                return false;
            }
        }
        
        if($('.form').hasClass('organisationData')){
            identity = 'Organisation';
            firstname = $('#firstname').val();
        }
        
        if($('.form').hasClass('anonymousData')){
            identity = 'Anonymous';
        }
        
        $.post("Controller/FirmstepController.php", 
            {identity: identity, title: title, firstname: firstname, surname: surname, service: service},
            function(data){
            //I can retrive this in json format too. 
            //sending it from php in html format make it a little easier and quicker
                $(".form-group input").val('');
                $(".empty-database").remove();
                if ($('#response').is(':empty')){
                    $('.results').html('<div class="items clearfix">'+data+'</div>');
                }else {
                    $('.results').append('<div class="items clearfix">'+data+'</div>');
                }
            }
        )
    });
});