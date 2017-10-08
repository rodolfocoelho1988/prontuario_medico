INSERT INTO `menu` (`id`, `nome`, `class`, `url`, `icone`, `pai_id`) VALUES
(1, 'Dashboard', 'dashboard', '/', 'settings_input_svideo', NULL),
(2, 'Médico', 'medico', '#', 'favorite', NULL),
(3, 'Cadastrar', 'medico', '/medico/cadastrar', NULL, 2),
(4, 'Listar', 'medico', '/medico', NULL, 2),
(5, 'Paciente', 'paciente', '#', 'face', NULL),
(6, 'Cadastrar', 'paciente', '/paciente/cadastrar', NULL, 5),
(7, 'Listar', 'paciente', '/paciente', NULL, 5),
(8, 'Agendamento', 'agendamento', '#', 'access_alarm', NULL),
(9, 'Cadastrar', 'agendamento', '/agendamento/cadastrar', NULL, 8),
(10, 'Listar', 'agendamento', '/agendamento', NULL, 8);
