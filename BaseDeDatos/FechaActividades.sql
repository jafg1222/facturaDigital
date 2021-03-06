--------------------------------------------------------
--  DDL for Table FECHASACTIVIDADES
--------------------------------------------------------

  CREATE TABLE "MHACIENDA"."FECHASACTIVIDADES" 
   (	"IDREGISTRO" VARCHAR2(20 BYTE), 
	"FECHAINICIO" VARCHAR2(100 BYTE), 
	"FECHAFIN" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  Constraints for Table FECHASACTIVIDADES
--------------------------------------------------------

  ALTER TABLE "MHACIENDA"."FECHASACTIVIDADES" MODIFY ("FECHAFIN" NOT NULL ENABLE);
  ALTER TABLE "MHACIENDA"."FECHASACTIVIDADES" MODIFY ("FECHAINICIO" NOT NULL ENABLE);
  ALTER TABLE "MHACIENDA"."FECHASACTIVIDADES" MODIFY ("IDREGISTRO" NOT NULL ENABLE);

