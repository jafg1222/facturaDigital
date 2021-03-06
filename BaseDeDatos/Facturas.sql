--------------------------------------------------------
--  DDL for Table FACTURAS
--------------------------------------------------------

  CREATE TABLE "MHACIENDA"."FACTURAS" 
   (	"IDFACTURAS" NUMBER(10,0), 
	"NUMREGISTRO" VARCHAR2(20 BYTE), 
	"FACTURA" "XMLTYPE"
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" 
 XMLTYPE COLUMN "FACTURA" STORE AS BASICFILE BINARY XML (
  TABLESPACE "SYSTEM" ENABLE STORAGE IN ROW CHUNK 8192 RETENTION 
  NOCACHE LOGGING 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)) ALLOW NONSCHEMA DISALLOW ANYSCHEMA ;
--------------------------------------------------------
--  DDL for Index FAC_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "MHACIENDA"."FAC_PK" ON "MHACIENDA"."FACTURAS" ("IDFACTURAS") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Trigger FAC_BIR
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "MHACIENDA"."FAC_BIR" 
BEFORE INSERT ON FACTURAS 
FOR EACH ROW

BEGIN
  SELECT FAC_SEQ.NEXTVAL
  INTO   :new.IDFACTURAS
  FROM   dual;
END;
/
ALTER TRIGGER "MHACIENDA"."FAC_BIR" ENABLE;
--------------------------------------------------------
--  Constraints for Table FACTURAS
--------------------------------------------------------

  ALTER TABLE "MHACIENDA"."FACTURAS" ADD CONSTRAINT "FAC_PK" PRIMARY KEY ("IDFACTURAS")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "MHACIENDA"."FACTURAS" MODIFY ("FACTURA" NOT NULL ENABLE);
  ALTER TABLE "MHACIENDA"."FACTURAS" MODIFY ("NUMREGISTRO" NOT NULL ENABLE);
  ALTER TABLE "MHACIENDA"."FACTURAS" MODIFY ("IDFACTURAS" NOT NULL ENABLE);
