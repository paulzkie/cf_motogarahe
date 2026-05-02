-- Update Yamaha account password to MD5('123123123')
-- Review before running. Adjust column names if different.

UPDATE dealers_accounts
SET password = MD5('123123123')
WHERE acc_name = 'yamaha' LIMIT 1;
