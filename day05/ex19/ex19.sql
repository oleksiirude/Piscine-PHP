SELECT TO_DAYS(MAX(member_history.date)) - TO_DAYS(MIN(member_history.date)) AS 'uptime' FROM member_history;