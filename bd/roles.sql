CREATE TABLE roles(
    id_role                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name                         VARCHAR (255) NOT NULL,
    
    created_role                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_role                 DATETIME        NULL,
    eliminated_role              DATETIME        NULL,
    enable_role                  VARCHAR (10) NOT NULL  DEFAULT '1'
);