SELECT COUNT(`date`) AS `movies` FROM `member_history`
	WHERE (`date` BETWEEN '2006-10-30' AND '2007-07-27')
	OR (MONTHNAME(`date`) = 'December' AND DAYOFMONTH(`date`) = 24);	