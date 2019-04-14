SELECT UPPER(`last_name`) AS 'NAME', `first_name`, `price` FROM `user_card`, `member`, `subscription`
	WHERE subscription.price > 42 AND member.id_sub = subscription.id_sub AND user_card.id_user = member.id_user_card
	ORDER BY user_card.last_name ASC, user_card.first_name ASC;	