CREATE TABLE mappings(
    id_map                          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    no_space                        NUMERIC (10,0) NOT NULL,
    enable_space                    VARCHAR (255) NOT NULL,
    observation                     VARCHAR (255) NOT NULL,

    created_mapping                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_mapping                 DATETIME        NULL,
    eliminated_mapping              DATETIME        NULL,
    enable_mapping                  VARCHAR (10) NOT NULL  DEFAULT '1'
);