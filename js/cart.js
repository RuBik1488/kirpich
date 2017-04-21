							$(document).ready(function(){
								$('.cart-open').fancybox({
										href: '#bought',
								});
								$('.close-f').on('click',function(){
										$('.fancybox-close').click();
										return false;
								});
								
								$('.not-show').on('click',function(){
									$.ajax({
									    type: "POST",
 									    url: "/ajax/not-show.php",
 									    data: "id=1",
 									    success: function(msg){
											$('.cart-open').addClass('closed');
											$('.close-f').click();
										}
									 });

								
								return false;
								});
								$('.addCartButton').on('click',function(){
									var quantity = "";
									quantity = $(this).data('poddon');
									var id=$(this).data('id');
									if(document.getElementById('ruz_dostavka')) {
                                        if (document.getElementById('ruz_dostavka').checked) {
                                            var deliv_name = $('#from').val() + ' - ' + $('#where').val();
                                            var deliv_price = $('#priceform').val();
                                            var deliv_product = $('input[name=\'ITEM_NAME\']').val();
                                        } else {
                                            var deliv_name = '';
                                            var deliv_price = '';
                                            var deliv_product = '';
                                        }
                                    }
									$.ajax({
									    type: "POST",
 									    url: "/ajax/cart.php",
 									    data: {"id":id, "quantity": quantity, 'poddon':quantity, 'dost_pr':deliv_price, 'dost_fw':deliv_name, 'dost_pd':deliv_product},
 									    success: function(msg){
											if(!$('.cart-open').hasClass('closed')){
												$('.cart-open').click();
											}
											$('.cart-container').load('/ajax/re_cart.php');
										}
									 });
								});
							});
