-- Verify agaveazul:units on mysql

BEGIN;

SELECT id, description
  FROM unit
 WHERE 0;

ROLLBACK;