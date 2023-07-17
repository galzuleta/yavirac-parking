CREATE TABLE tickets(
    id_ticket                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    
    plate                          VARCHAR (255) NOT NULL,
    name_customer                  VARCHAR (255) NOT NULL,
    lastname_customer              VARCHAR (255) NOT NULL,
    identification                 VARCHAR (255) NOT NULL,
    type_transport                 VARCHAR (255) NOT NULL,
    type_customer                  VARCHAR (255) NOT NULL,
    cubicle                        NUMERIC (10,0) NOT NULL,
    entry_date                     DATE NOT NULL,
    entry_time                     TIME NOT NULL,
    out_date                       DATE NOT NULL,
    ticket_status                  VARCHAR (255) NOT NULL,
    user_session                   VARCHAR (255) NOT NULL,
    
    created_ticket                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_ticket                 DATETIME        NULL,
    eliminated_ticket              DATETIME        NULL,
    enable_ticket                  VARCHAR (10) NOT NULL  DEFAULT '1'
);