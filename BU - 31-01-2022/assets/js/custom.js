var site_url = 'https://bespoke.external.smart-staging.com.au/ajax/';
var site_url2 = 'https://bespoke.external.smart-staging.com.au/';
$(document).ready(function(){
	
	$(".mob_read_more").click(function(){
		if($(this).hasClass("active")){
			$(".full_para").hide();
			$(".half_para").show();
			$(this).removeClass("active")
			$(this).text("Read More");
		} else {
			$(".half_para").hide();
			$(".full_para").show();
			$(this).addClass("active")
			$(this).text("Less More");
		}
	});
	
	$(".see_all_services").click(function(){
		var _url = $(this).attr("data-url");
		window.location.href = site_url2+_url;
	});	
	
	$("#change_services").change(function(){
		var _val = $(this).val();
		 $('html, body').animate({ scrollTop: $("."+_val).offset().top}, 1000);
	});
	
	
	$("#myfile").change(function(){
		var form = $(".form-claims");
		var formdata = false;
		if (window.FormData){
			formdata = new FormData(form[0]);
			formdata.append('section','upload_multiple');
		}
		$(".append_files").html("<h2 style='color:red;font-weight:bold;'>Loading.. File Is uploading</h2>");
		$.ajax({
			url         : site_url,
			data        : formdata,
			cache       : false,
			contentType : false,
			processData : false,
			type        : 'POST',
			success     : function(data){
				var data = JSON.parse(data);	
				var _length = data.length;
				$(".file_count").text(_length);
				
				var _html = '';
				$.each( data, function( i, val ) {
					if(val != '')	{
						_html+=`<div class="file-uploaded-item">
								<span class="file-name">
									`+val+`
								</span>
								<span class="file-closs" data-name="`+val+`">
									<i class="fa fa-times"></i>
								</span>
							</div>`;
					}
				});
				
				$(".append_files").html(_html);
			}
		},'json');
	});
	
	
	$(".append_files").on("click",".file-closs",function(){
		var _name = $(this).attr("data-name");
		var _this = $(this);
		$.ajax({
			url:site_url,
			type:"POST",
			data:{
				section:"delete_file",
				values:_name,
			},
			dataTpe:"json",
			success:function(data){
				_this.closest(".file-uploaded-item").remove();
			}
		});
	});
	
	$(".send_inquiry").click(function(){
		var _error = 0;
		
		if($("#fName").val() == ''){
			_error = 1;
			$(".fName_error").text("Please Enter Name");
		} else {
			$(".fName_error").text("");
		}
		
		if($("#mobile").val() == ''){
			_error = 1;
			$(".mobile_error").text("Please Enter Mobile");
		}  else {
			$(".mobile_error").text("");
		}
		
		
		if($("#email").val() == ''){
			_error = 1;
			$(".email_error").text("Please Enter Email Address");
		} else if (IsEmail($('#email').val()) == false) {
           _error = 1;
			$(".email_error").text("Please Enter valid Email Address");
        } else {
			$(".email_error").text("");
		}
		
		if(_error == 0) {
			$(this).text("Loading....");
			var form = $(".men-form");
			var formdata = false;
			if (window.FormData){
				formdata = new FormData(form[0]);
				formdata.append('section','contact_form');
			}
			
			$.ajax({
				url         : site_url,
				data        : formdata,
				cache       : false,
				contentType : false,
				processData : false,
				type        : 'POST',
				success     : function(data){
					$(".send_inquiry").text("Send an Enquiry");
					var data = JSON.parse(data);						
					if(data.success == 1) {
						var delay = 2000;
						setTimeout(function() { window.location = site_url2 + 'contact-us/thank-you'; }, delay);
					}					
				}
			},'json');
		}
	});
	
});
/* 

function Rolodex($container) {
  this.$container = $container;
  this.$holder = this.$container.querySelectorAll('.rolodex_holder')[0];
  this.$cards = [].slice.call(this.$holder.querySelectorAll('.rolodex-card'), 0);
  this.$fold = document.createElement('div');
  this.$fold.className = 'rolodex-fold';
  this.$holder.insertBefore(this.$fold, this.$cards[0]);
  this.$cards.slice(0, Math.floor(this.$cards.length / 2))
  .forEach(function($card, i) {
    this.$holder.insertBefore($card, this.$holder.firstChild);
  }.bind(this));
  this.$container.querySelectorAll('.rolodex_next')[0]
  .addEventListener('click', this.next.bind(this));
  this.$container.querySelectorAll('.rolodex_prev')[0]
  .addEventListener('click', this.previous.bind(this));
}

Rolodex.prototype.next = function() {
  this.$holder.appendChild(this.$fold.previousElementSibling);
  this.$holder.insertBefore(this.$fold.nextElementSibling, this.$holder.firstElementChild);
  this.$holder.lastElementChild.classList.add('to-fold');
  this.fold();
};

Rolodex.prototype.previous = function() {
  this.$holder.insertBefore(this.$holder.lastElementChild, this.$fold);
  this.$holder.insertBefore(this.$holder.firstElementChild, this.$fold.nextElementSibling);
  this.$fold.previousElementSibling.classList.add('to-fold');
  this.fold();
};

Rolodex.prototype.fold = function() {
  if (this.foldTimeout) window.clearTimeout(this.foldTimeout);
  this.foldTimeout = window.setTimeout(function() {
    [].forEach.call(this.$holder.querySelectorAll('.to-fold'), function($card) {
      $card.classList.remove('to-fold');
    });
  }.bind(this), 25);
};

if (jQuery('.rolodex').length) {
  var rolodex = new Rolodex(document.querySelectorAll('.rolodex')[0]);
} */
 function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }