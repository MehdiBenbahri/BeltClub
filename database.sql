CREATE TABLE `organisations` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `nom` varchar(45) CHARACTER SET latin1 NOT NULL,
                                 `slug` varchar(10) CHARACTER SET latin1 NOT NULL,
                                 `img_orga` varchar(255) NOT NULL,
                                 `created` datetime NOT NULL,
                                 `modified` datetime NOT NULL,
                                 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

CREATE TABLE `roles` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) CHARACTER SET latin1 NOT NULL,
                         `created` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '(CURDATE())',
                         `is_orga` tinyint(4) NOT NULL,
                         `modified` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
                         `active` tinyint(4) NOT NULL DEFAULT 1,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `id_organisation` int(11) NOT NULL,
                         `id_role` int(11) NOT NULL,
                         `name` varchar(45) CHARACTER SET latin1 NOT NULL,
                         `email` varchar(45) CHARACTER SET latin1 NOT NULL,
                         `tel_ingame` varchar(45) CHARACTER SET latin1 NOT NULL,
                         `discord_id` varchar(45) CHARACTER SET latin1 NOT NULL,
                         `password` varchar(1000) CHARACTER SET latin1 NOT NULL,
                         `validated_account` tinyint(4) NOT NULL DEFAULT 0,
                         `created` datetime DEFAULT NULL,
                         `modified` datetime DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         KEY `fk_users_orga_idx` (`id_organisation`),
                         KEY `fk_users_role_idx` (`id_role`),
                         CONSTRAINT `fk_users_orga` FOREIGN KEY (`id_organisation`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                         CONSTRAINT `fk_users_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `events_descriptions` (
                                       `id` int(11) NOT NULL AUTO_INCREMENT,
                                       `title` varchar(45) COLLATE utf8_bin NOT NULL,
                                       `description` longtext COLLATE utf8_bin NOT NULL,
                                       `img_path` varchar(200) COLLATE utf8_bin NOT NULL,
                                       `is_complete` tinyint(4) NOT NULL DEFAULT 0,
                                       `created` datetime NOT NULL,
                                       `modified` datetime DEFAULT NULL,
                                       PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `events_rights` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `id_event` int(11) NOT NULL,
                                 `id_user` int(11) DEFAULT NULL,
                                 `id_role` int(11) DEFAULT NULL,
                                 `name` varchar(45) COLLATE utf8_bin NOT NULL,
                                 `level` int(11) NOT NULL DEFAULT 1,
                                 PRIMARY KEY (`id`),
                                 KEY `fk_events_rights_events_idx` (`id_event`),
                                 KEY `fk_events_rights_roles_idx` (`id_role`),
                                 KEY `fk_events_rights_users_idx` (`id_user`),
                                 CONSTRAINT `fk_events_rights_events` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
                                 CONSTRAINT `fk_events_rights_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
                                 CONSTRAINT `fk_events_rights_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `events` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `id_organisation` int(11) NOT NULL,
                          `id_event_type` int(11) NOT NULL,
                          `id_event_description` int(11) NOT NULL,
                          `start_date` datetime NOT NULL,
                          `end_date` datetime NOT NULL,
                          `is_private` tinyint(4) NOT NULL DEFAULT 0,
                          `created` datetime NOT NULL,
                          `modified` datetime DEFAULT NULL,
                          PRIMARY KEY (`id`),
                          KEY `fk_events_orga_idx` (`id_organisation`),
                          KEY `fk_events_events_type_idx` (`id_event_type`),
                          KEY `fk_events_events_description_idx` (`id_event_description`),
                          CONSTRAINT `fk_events_events_description` FOREIGN KEY (`id_event_description`) REFERENCES `events_descriptions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                          CONSTRAINT `fk_events_events_type` FOREIGN KEY (`id_event_type`) REFERENCES `events_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                          CONSTRAINT `fk_events_orga` FOREIGN KEY (`id_organisation`) REFERENCES `organisations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

CREATE TABLE `events_types` (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `slug` varchar(45) COLLATE utf8_bin NOT NULL,
                                `name` varchar(45) COLLATE utf8_bin NOT NULL,
                                `is_legal` tinyint(4) NOT NULL DEFAULT 0,
                                `created` datetime NOT NULL,
                                `modified` datetime DEFAULT NULL,
                                `css_class` varchar(45) COLLATE utf8_bin DEFAULT NULL,
                                PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `events_lots` (
                               `id` int(11) NOT NULL AUTO_INCREMENT,
                               `id_event` int(11) NOT NULL,
                               `name` varchar(45) COLLATE utf8_bin NOT NULL,
                               `somme` int(11) DEFAULT NULL,
                               `is_money` tinyint(4) NOT NULL DEFAULT 0,
                               `is_locked` tinyint(4) NOT NULL DEFAULT 0,
                               `created` datetime NOT NULL,
                               `modified` datetime DEFAULT NULL,
                               `price_depart` int(11) DEFAULT NULL,
                               `price_min` int(11) DEFAULT NULL,
                               PRIMARY KEY (`id`),
                               KEY `fk_events_lots_events_idx` (`id_event`),
                               CONSTRAINT `fk_events_lots_events` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `contributors` (
                                `id` int(11) NOT NULL,
                                `id_users` int(11) NOT NULL,
                                `id_events` int(11) NOT NULL,
                                `somme_reverse` int(11) DEFAULT NULL,
                                `somme_du` int(11) DEFAULT NULL,
                                `pourcentage` float DEFAULT NULL,
                                `created` datetime NOT NULL,
                                `modified` datetime DEFAULT NULL,
                                PRIMARY KEY (`id`),
                                KEY `fk_contributors_users_idx` (`id_users`),
                                KEY `fk_contributors_events_idx` (`id_events`),
                                CONSTRAINT `fk_contributors_events` FOREIGN KEY (`id_events`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                CONSTRAINT `fk_contributors_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `entrys` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `id_event` int(11) NOT NULL,
                          `id_contributor` int(11) DEFAULT NULL,
                          `nom` varchar(45) CHARACTER SET latin1 NOT NULL,
                          `prenom` varchar(45) CHARACTER SET latin1 NOT NULL,
                          `tel_ingame` varchar(45) CHARACTER SET latin1 NOT NULL,
                          `discord_id` varchar(45) CHARACTER SET latin1 NOT NULL,
                          `somme` int(11) DEFAULT NULL,
                          `coef` int(11) DEFAULT NULL,
                          PRIMARY KEY (`id`),
                          KEY `fk_entrys_events_idx` (`id_event`),
                          KEY `fk_entrys_contributors_idx` (`id_contributor`),
                          CONSTRAINT `fk_entrys_contributors` FOREIGN KEY (`id_contributor`) REFERENCES `contributors` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
                          CONSTRAINT `fk_entrys_events` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

