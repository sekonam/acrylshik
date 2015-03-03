function article_save(url) {
						var newData = {
								title:$('#TitleId').val(),
								category_id:$('#CategoryId').val(),
								related:','+($('#RelatedId').val()||[]).join(',')+',',
								_short:tinyMCE.get('Short'+$('#Rand').val()+'Id').getContent(),
								txt:tinyMCE.get('Text'+$('#Rand').val()+'Id').getContent(),
								id:$('#Id').val(),
								count:$('#Count').val()
							};
							console.log(newData);
						$.ajax({
							type: "POST",
							url: url,
							data: newData
						}).done(
							function(resp){
								if(resp.code=='OK'){
									if(newData.id){
										$('[data-article-id="'+newData.id+'"] a.title').html(newData.title);
									}else{
										$('.data-article').append(resp['tr']);
									}
								}
							}
						);
}