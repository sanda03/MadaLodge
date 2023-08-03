INSERT INTO role (role_name) VALUES
('Administrator'),
('Receptionist'),
('Cleaning staff'),
('Client'),
('Visitor');

INSERT INTO users (username, password, first_name, last_name, cin, society_name, number, email, secondary_number, gender, birthdate, role_id) VALUES
('johnDoe', 'password123', 'John', 'Doe', '123456789', 'ABC Company', '1234567890', 'john.doe@example.com', '9876543210', 'M', '1990-01-01', 1),
('janeSmith', 'password456', 'Jane', 'Smith', '987654321', 'XYZ Corporation', '0987654321', 'jane.smith@example.com', '0123456789', 'F', '1992-05-10', 2),
('bobJohnson', 'password789', 'Bob', 'Johnson', '543216789', '123 Industries', '4567890123', 'bob.johnson@example.com', '7890123456', 'M', '1985-11-15', 3),
('aliceWilliams', 'passwordabc', 'Alice', 'Williams', '876543210', 'ABC Corporation', '7890123456', 'alice.williams@example.com', '2345678901', 'F', '1988-07-20', 4),
('samBrown', 'passworddef', 'Sam', 'Brown', '345678912', 'XYZ Company', '5678901234', 'sam.brown@example.com', '9012345678', 'M', '1994-03-25', 5);



INSERT INTO room_option (name, description, price) VALUES
('Jacuzzi', 'Profitez du jacuzzi priv� dans votre chambre pour une d�tente ultime.', 50.00),
('Vue sur la mer', 'Admirez une vue magnifique sur la mer depuis votre chambre.', 20.00),
('Service de chambre 24h/24', 'Profitez du service de chambre disponible 24h/24 pour satisfaire vos besoins.', 15.00),
('Wi-Fi haut d�bit', 'Restez connect� avec un acc�s Wi-Fi haut d�bit dans votre chambre.', 10.00),
('Petit-d�jeuner inclus', 'Commencez votre journ�e avec un d�licieux petit-d�jeuner inclus dans votre s�jour.', 25.00);

INSERT INTO room_type (name, base_price) VALUES
('Simple', 100.00),
('Double', 150.00),
('Familial', 200.00),
('VIP', 250.00);

INSERT INTO discount (name, rate, start_time, end_time) VALUES
('Offre sp�ciale �t�', 0.15, '2023-06-01', '2023-08-31'),
('Promotion de printemps', 0.10, '2023-03-15', '2023-04-15'),
('R�duction de derni�re minute', 0.20, '2023-07-01', '2023-07-07'),
('Offre de r�servation anticip�e', 0.25, '2023-09-01', '2023-12-31'),
('R�duction pour les membres', 0.12, '2023-01-01', '2023-12-31');

INSERT INTO city (name) VALUES
('Antananarivo'),
('Toamasina'),
('Mahajanga'),
('Antsirabe'),
('Fianarantsoa');

INSERT INTO hotel (name, address, is_active, id_city) VALUES
('H�tel A', 'Adresse A', true, 1),
('H�tel B', 'Adresse B', true, 1),
('H�tel C', 'Adresse C', true, 2),
('H�tel D', 'Adresse D', true, 2),
('H�tel E', 'Adresse E', true, 3),
('H�tel F', 'Adresse F', true, 3),
('H�tel G', 'Adresse G', true, 4),
('H�tel H', 'Adresse H', true, 4),
('H�tel I', 'Adresse I', true, 5),
('H�tel J', 'Adresse J', true, 5);




INSERT INTO room (id_hotel, id_room_type) VALUES
(1, 1),
(1, 1),
(1, 2),
(2, 2),
(2, 2),
(2, 3),
(3, 3),
(3, 3),
(3, 3),
(4, 4),
(4, 4),
(5, 4),
(5, 4),
(5, 4),
(5, 4);


INSERT INTO conference_room (capacity, price_per_hour, id_hotel) VALUES
(50, 100.00, 1),
(30, 80.00, 2),
(20, 60.00, 3),
(40, 90.00, 4),
(25, 70.00, 5);

INSERT INTO payment_method (name)
VALUES
('Cash'),
('Mobile money');

INSERT INTO reservation (start_timestamp, end_timestamp, special_requests, is_paid, is_cancelled, penalty_rate, handler_id, id_room, id_conference_room, id_payment_method, id_user)
VALUES
    ('2023-07-15 10:00:00', '2023-07-17 12:00:00', 'No special requests', true, false, 0, 1, 1, null, 1, 1),
    ('2023-07-18 14:00:00', '2023-07-20 10:00:00', 'Early check-in requested', false, false, 0, 2, 2, null, 2, 1),
    ('2023-07-21 12:00:00', '2023-07-23 14:00:00', 'Room with ocean view preferred', true, false, 0, 3, 3, null, 1, 2),
    ('2023-07-24 16:00:00', '2023-07-26 18:00:00', 'Late check-out requested', false, false, 0, 1, 4, null, 1, 3),
    ('2023-07-27 10:00:00', '2023-07-29 12:00:00', 'No special requests', true, false, 0, 2, 5, null, 2, 2);

INSERT INTO rating (rate, comment, id_hotel, id_users) VALUES
(4, 'Tr�s bon s�jour, personnel amical et serviable.', 1, 1),
(5, 'Excellent h�tel, chambre spacieuse et propre.', 2, 2),
(3, 'D�cevant, probl�me avec le service de restauration.', 3, 3),
(4, 'Belle vue depuis la chambre, recommand�.', 4, 4),
(5, 'Superbe exp�rience, rien � redire.', 5, 5);

INSERT INTO have_room_option (room_id, option_id) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3),
(4, 4);

INSERT INTO have_reduced_price (id_discount, id_room_type) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1);

INSERT INTO have_reduced_price_conference_room (id_discount, id_conference_room) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);
