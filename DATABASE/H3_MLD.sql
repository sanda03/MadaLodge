DROP DATABASE IF EXISTS hotel_managing;

CREATE DATABASE hotel_managing;
\c hotel_managing;

CREATE TABLE "role" (
    role_id SERIAL PRIMARY KEY,
    role_name VARCHAR(20) NOT NULL
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    first_name VARCHAR(128) NOT NULL,
    last_name VARCHAR(128) NOT NULL,
    cin VARCHAR(20) NOT NULL,
    society_name VARCHAR(128) NOT NULL,
    "number" VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    secondary_number VARCHAR(20) NOT NULL,
    gender CHAR(1) NOT NULL,
    birthdate DATE NOT NULL,
    role_id INT NOT NULL REFERENCES "role"(role_id)
);

CREATE TABLE payment_method (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(20) NOT NULL
);

CREATE TABLE room_option (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price NUMERIC NOT NULL
);

CREATE TABLE room_type (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    base_price NUMERIC NOT NULL
);

CREATE TABLE discount (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    rate FLOAT NOT NULL,
    start_time TIMESTAMP NOT NULL,
    end_time TIMESTAMP NOT NULL
);

CREATE TABLE city (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL
);

CREATE TABLE hotel (
    id SERIAL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    is_active BOOLEAN NOT NULL,
    id_city INT NOT NULL REFERENCES city(id)
);

CREATE TABLE room (
    id SERIAL PRIMARY KEY,
    id_hotel INT NOT NULL REFERENCES hotel(id),
    id_room_type INT NOT NULL REFERENCES room_type(id)
);

CREATE TABLE conference_room (
    id SERIAL PRIMARY KEY,
    capacity INT NOT NULL,
    price_per_hour NUMERIC NOT NULL,
    id_hotel INT NOT NULL REFERENCES hotel(id)
);

CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    creation_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    start_timestamp TIMESTAMP NOT NULL,
    end_timestamp TIMESTAMP NOT NULL,
    special_requests TEXT,
    is_paid BOOLEAN DEFAULT false,
    is_cancelled BOOLEAN DEFAULT false,
    penalty_rate FLOAT DEFAULT 0,
    handler_id INT REFERENCES users(id) NOT NULL,
    id_room INT REFERENCES room(id),
    id_conference_room INT REFERENCES conference_room(id),
    id_payment_method INT REFERENCES payment_method(id) NOT NULL,
    id_user INT REFERENCES users(id) NOT NULL,
    CONSTRAINT timestamp_check CHECK (start_timestamp > CURRENT_TIMESTAMP AND end_timestamp > start_timestamp),
    CONSTRAINT room_or_conference_not_null CHECK (id_room IS NOT NULL OR id_conference_room IS NOT NULL)
);

CREATE TABLE rating (
    id SERIAL PRIMARY KEY,
    rate INT NOT NULL,
    comment TEXT NOT NULL,
    id_hotel INT NOT NULL REFERENCES hotel(id),
    id_users INT NOT NULL REFERENCES users(id)
);

CREATE TABLE have_room_option (
    id SERIAL PRIMARY KEY,
    room_id INT NOT NULL REFERENCES room(id),
    option_id INT NOT NULL REFERENCES room_option(id)
);

CREATE TABLE have_reduced_price (
    id SERIAL PRIMARY KEY,
    id_discount INT NOT NULL REFERENCES discount(id),
    id_room_type INT NOT NULL REFERENCES room_type(id)
);

CREATE TABLE have_reduced_price_conference_room (
    id SERIAL PRIMARY KEY,
    id_discount INT NOT NULL REFERENCES discount(id),
    id_conference_room INT NOT NULL REFERENCES conference_room(id)
);

ALTER TABLE room 
ADD photo VARCHAR(255);

ALTER TABLE hotel
ADD photo VARCHAR(255);