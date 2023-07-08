CREATE TABLE settings(
    id_setting                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_parking                    VARCHAR (255) NOT NULL,
    entity_activity                 VARCHAR (255) NOT NULL,
    address                         VARCHAR (255) NOT NULL,
    zone                            VARCHAR (255) NOT NULL,
    phone                           INTEGER NOT NULL,
    city                            VARCHAR (255) NOT NULL,
    country                         VARCHAR (255) NOT NULL,

    created_setting                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_setting                 DATETIME        NULL,
    eliminated_setting              DATETIME        NULL,
    enable_setting                  VARCHAR (10) NOT NULL  DEFAULT '1'
);