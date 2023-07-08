CREATE TABLE customers(
    id_customer                     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    identification                  NUMERIC(10,0) NOT NULL,
    name                            VARCHAR (255) NOT NULL,
    lastname                        VARCHAR (255) NOT NULL,
    plate                           VARCHAR (255) NOT NULL,
    type_transport                  VARCHAR (255) NOT NULL,
    type_customer                   VARCHAR (255) NOT NULL,
    
    created_customer                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_customer                 DATETIME        NULL,
    eliminated_customer              DATETIME        NULL,
    enable_customer                  VARCHAR (10) NOT NULL  DEFAULT '1'
);