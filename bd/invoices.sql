CREATE TABLE invoices(
    id_invoice                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_setting                      VARCHAR (255) NOT NULL,
    id_customer                     VARCHAR (255) NOT NULL,
    no_invoice                      VARCHAR (255) NOT NULL,

    date_invoice                    TIMESTAMP NOT NULL,
    date_issue                      DATE NOT NULL,
    time_issue                      TIME NOT NULL,
    date_out                        DATE NOT NULL,
    time_out                        TIME NOT NULL,
    time_used                       TIME NOT NULL,
    cubicle                         VARCHAR (255) NOT NULL,
    detail                          VARCHAR (255) NOT NULL,
    price                           DECIMAL (10,2) NOT NULL,
    total                           DECIMAL (10,2)  NOT NULL,
    amount_total                    DECIMAL (10,2) NOT NULL,
    amount_literal                 VARCHAR (255) NOT NULL,
    user_session                    VARCHAR (255) NOT NULL,
    qr                              VARCHAR (255)  NULL,
    
    created_invoice                 DATETIME        NULL  DEFAULT CURRENT_TIMESTAMP,
    updated_invoice                 DATETIME        NULL,
    eliminated_invoice              DATETIME        NULL,
    enable_invoice                  VARCHAR (10) NOT NULL  DEFAULT '1'
);