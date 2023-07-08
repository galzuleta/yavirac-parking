CREATE TABLE users(
    id                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name                    VARCHAR (255) NOT NULL,
    lastname                VARCHAR (255) NOT NULL,
    role                    VARCHAR (255) NULL,
    email                   VARCHAR (255) NOT NULL,
    email_verify            VARCHAR (255) NULL,
    password_user           VARCHAR (255) NOT NULL,
    token                   VARCHAR (255) NULL,
    created_user            DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_user            DATETIME        NULL,
    eliminated_user         DATETIME        NULL,
    enable_user             VARCHAR (10) NOT NULL  DEFAULT '1'
);