INSERT INTO `users` (`name`, `email`, `password`, `user_type`) VALUES 
('Admin', 'admin@x.com', '$2y$10$XhyzJiji4/PN7zjyCcuAT.mEB3uNCBUiqTv9m.KVuys7pAaON7XdO', 'Admin'), 
('Joni Piring', 'user@x.com', '$2y$10$dPurtqQZb9M.4fNfdYq2Gecl1LSsi7xESAy7UEibz1ndarZGkKDL2', 'User'),
('Jeni Gelas', 'user@y.com', '$2y$10$dPurtqQZb9M.4fNfdYq2Gecl1LSsi7xESAy7UEibz1ndarZGkKDL2', 'User'),
('Mintup', 'user@z.com', '$2y$10$dPurtqQZb9M.4fNfdYq2Gecl1LSsi7xESAy7UEibz1ndarZGkKDL2', 'User');

INSERT INTO `mahasiswa` (`id_user`, `nim`, `nama`, `prodi`, `semester`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('2', 'M0525001', 'Joni Piring', 'Informatika', 3, 'user@x.com', NULL, 'user', NULL, NULL, NULL),
('3', 'L0226001', 'Jeni Gelas', 'Bukan Informatika', 1, 'user@y.com', NULL, 'user', NULL, NULL, NULL),
('4','M0520002', 'Mintup', 'Informatika', 1, 'user@z.com', NULL, 'user', NULL, NULL, NULL);

INSERT INTO `pengajuan_mahasiswa` (`id`, `id_mahasiswa`, `status`, `skor_total`, `semester`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 'Accepted', 10, 1, 2001, NULL, '2023-06-08 07:50:44'),
(3, 1, 'Need Action', 9, 2, 2002, NULL, '2024-06-08 07:50:44'),
(2, 2, 'Rejected', 10, 1, 2001, NULL, '2023-06-08 07:50:49'),
(4, 3, 'Need Action', 10, 1, 2001, NULL, '2023-06-08 07:50:49');

INSERT INTO `jawaban_mahasiswa` (`id`, `id_mahasiswa`, `id_pengajuan_mahasiswa`, `id_pertanyaan`, `id_jawaban`, `id_skor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, 25, 1, NULL, NULL),
(2, 2, 2, 8, 21, 2, NULL, NULL),
(3, 3, 4, 1, 1, 1, NULL, NULL),
(4, 1, 3, 2, 5, 1, NULL, NULL),
(5, 1, 1, 1, 1, 1, NULL, NULL),
(6, 1, 1, 2, 5, 1, NULL, NULL),
(7, 1, 1, 3, 9, 1, NULL, NULL),
(8, 1, 1, 4, 13, 1, NULL, NULL),
(9, 1, 1, 5, 15, 1, NULL, NULL),
(10, 1, 1, 6, 17, 1, NULL, NULL),
(11, 1, 1, 7, 21, 1, NULL, NULL),
(12, 1, 1, 9, 29, 1, NULL, NULL),
(13, 1, 1, 10, 33, 1, NULL, NULL),
(14, 1, 1, 11, 37, 1, NULL, NULL),
(15, 1, 1, 12, 41, 1, NULL, NULL),
(16, 1, 1, 13, 44, 1, NULL, NULL),
(17, 1, 1, 14, 48, 1, NULL, NULL),
(18, 3, 4, 8, 25, 1, NULL, NULL),
(19, 3, 4, 1, 1, 1, NULL, NULL),
(20, 3, 4, 2, 5, 1, NULL, NULL),
(21, 3, 4, 3, 9, 1, NULL, NULL),
(22, 3, 4, 4, 13, 1, NULL, NULL),
(23, 3, 4, 5, 15, 1, NULL, NULL),
(24, 3, 4, 6, 17, 1, NULL, NULL),
(25, 3, 4, 7, 21, 1, NULL, NULL),
(26, 3, 4, 9, 29, 1, NULL, NULL),
(27, 3, 4, 10, 33, 1, NULL, NULL),
(28, 3, 4, 11, 37, 1, NULL, NULL),
(29, 3, 4, 12, 41, 1, NULL, NULL),
(30, 3, 4, 13, 44, 1, NULL, NULL),
(31, 3, 4, 14, 48, 1, NULL, NULL);


