<?php
namespace Webdev\BlogBundle\Extension;

class TextExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'text_twig_extension';
	}
	
	public function getFilters()
	{
		return array(
			'truncate' => new \Twig_Filter_Method($this, 'truncate'),
			'comment_date' => new \Twig_Filter_Method($this, 'comment_date')
		);
	}
	
	public function truncate($text, $limit = 150)
	{
		if(mb_strlen($text, 'UTF-8') > $limit) {
			
			$text = mb_strcut($text, 0, $limit, 'UTF-8');
			$lastWhitespace = mb_strrpos($text, ' ', 0, 'UTF-8');
			$text = mb_strcut($text, 0, $lastWhitespace, 'UTF-8');
			
		}
		
		return $text;
	}
	
	public function comment_date(\DateTime $datetime)
	{		
		$yesterday = new \DateTime('yesterday');		
		$date = $datetime->format('d.m.Y');
		$time = $datetime->format('H:i');
		
		if($datetime > $yesterday)
			$date = 'Heute';
	
		return "{$date} um {$time} Uhr";;
	}
}