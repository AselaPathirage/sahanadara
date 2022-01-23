ALTER TABLE safehouse ADD days INT(2) DEFAULT 0;
CREATE DEFINER=`root`@`localhost` EVENT `increament_days_spent` ON SCHEDULE EVERY 24 HOUR STARTS '2022-01-23 00:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'increament days of spent' DO UPDATE safehouse SET days = days + 1;
CREATE DEFINER=`root`@`localhost` EVENT `password_reset_token_exipiring_event` ON SCHEDULE EVERY 30 MINUTE STARTS '2021-11-20 19:04:09' ON COMPLETION PRESERVE ENABLE COMMENT 'Clean up token every 30 minutes daily!' DO DELETE FROM resetpass WHERE resetpass.createdTime < DATE_SUB(NOW(), INTERVAL 1 DAY);
-- SET GLOBAL event_scheduler = ON;