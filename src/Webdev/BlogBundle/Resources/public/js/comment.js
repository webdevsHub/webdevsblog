/**
 * toggle comment answers
 * 
 * @param comment_id
 */
function toggleCommentAnswers(comment_id)
{
	answers = $('#comment_' + comment_id).find('div').first();
	link = $('#comment_' + comment_id).find('a').first();
	
	// change link text
	if(answers.is(':visible')) {
	
		link.text('einblenden');
		
	} else {
		
		link.text('ausblenden');
		
	}
	
	// toggle answers
	answers.slideToggle('slow');
}