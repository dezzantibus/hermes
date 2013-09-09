
function resizeHighlightTextVertical(image)
{

	var height = 445;

	var box = $(image).parent();

	height -= $(box).children('img').outerHeight(true);
	height -= $(box).children('h2').outerHeight(true);
	height -= $(box).children('p').outerHeight(true);
	height -= $(box).children('a').outerHeight(true);
	$(box).children('div').css('height', height + 'px');

}

function resizeHighlightTextHorizontal(image)
{

	var height = 200;

	var box = $(image).parent();

	height -= $(box).children('h2').outerHeight(true);
	height -= $(box).children('p').outerHeight(true);
	height -= $(box).children('a').outerHeight(true);
	$(box).children('div').css('height', height + 'px');

}

function resizeCategoryText(box)
{

	var height = 120;

	height -= $(box).children('.title').outerHeight(true);
console.log(height);
	$(box).children('.text').css('height', height + 'px');

}
