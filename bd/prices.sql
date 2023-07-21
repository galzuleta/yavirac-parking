CREATE TABLE prices(
    id_price                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    amount                        VARCHAR (255)  NOT NULL,
    detail                        VARCHAR (255) NOT NULL,
    price                         DECIMAL (10,2) NOT NULL,
    type_transport                VARCHAR (255) NOT NULL,
    
    created_price                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_price                 DATETIME        NULL,
    eliminated_price              DATETIME        NULL,
    enable_price                  VARCHAR (10) NOT NULL  DEFAULT '1'
);