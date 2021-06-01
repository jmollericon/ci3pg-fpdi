-- documentation fpdi
-- https://manuals.setasign.com/fpdi-manual/v2/the-fpdi-class/#index-3


-- Database: db_cipg

-- DROP DATABASE db_cipg;

CREATE DATABASE db_cipg
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.UTF-8'
    LC_CTYPE = 'en_US.UTF-8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


-- SCHEMA: public

-- DROP SCHEMA public ;

CREATE SCHEMA public
    AUTHORIZATION postgres;

COMMENT ON SCHEMA public
    IS 'standard public schema';

GRANT ALL ON SCHEMA public TO PUBLIC;

GRANT ALL ON SCHEMA public TO postgres;


-- Table: public.archivo

-- DROP TABLE public.archivo;

CREATE TABLE IF NOT EXISTS public.archivo
(
    documento character varying(255) COLLATE pg_catalog."default",
    id bigint NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 9223372036854775807 CACHE 1 )
)

TABLESPACE pg_default;

ALTER TABLE public.archivo
    OWNER to postgres;