-- Seed Entrepreneur Data for PinePix EIMS
-- This script creates entrepreneur users, farms, and shops for all Malaysian states
-- User IDs start from 2
-- Password hash for all: $2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC
--
-- IMPORTANT NOTES:
-- 1. This script uses explicit user IDs (2-17). If these IDs already exist, the script will fail.
--    To avoid conflicts, you can either:
--    a) Delete existing users with IDs 2-17 first, OR
--    b) Remove the ID column from INSERT statements to auto-increment
-- 2. All entrepreneurs are set as 'approved' and email_verified = 1
-- 3. Farm sizes are random values between 8-25 acres
-- 4. All shops have operation hours set to 'Mon-Fri 9-5'

USE pinepix;

-- ============================================
-- JOHOR (User ID: 2)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(2, 'entrepreneur', 'NICTAR PINEAPPLE PARK', 'nictarpineapplepark@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60127002235', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(2, 'NICTAR PINEAPPLE PARK', '15 acres', 'PTD 10822, Batu 24, 81500 Pekan Nanas, Johor', 1.505010570747392, 103.54916052705546, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(2, 'Nictar Pineapple House', 'PTD 2103, Kg. Pak Intan Parit Sikom, 82010, Johor', 1.5039809575688172, 103.53439764854569, 'Mon-Fri 9-5', '60127072589', NOW(), NOW());

-- ============================================
-- SELANGOR (User ID: 3)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(3, 'entrepreneur', 'Saudagar Nanas Agrofarm', 'saudagarnanasagrofarm@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60102882987', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(3, 'Saudagar Nanas Agrofarm', '22 acres', 'Lot 3000, Kg Sg Merab Luar, Kampung Sungai Merab Luar, 43000 Kajang, Selangor', 2.9359384697675597, 101.74457058830788, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(3, 'Saudagar Nanas Agrofarm', 'Lot 3000, Kg Sg Merab Luar, Kampung Sungai Merab Luar, 43000 Kajang, Selangor', 2.9359384697675597, 101.74457058830788, 'Mon-Fri 9-5', '60102882987', NOW(), NOW());

-- ============================================
-- NEGERI SEMBILAN (User ID: 4)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(4, 'entrepreneur', 'Sky Ladder Pineapple Farm', 'skyladderpineapplefarm@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60176173633', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(4, 'Sky Ladder Pineapple Farm, Port Dickson', '18 acres', 'Lot 2273 Jalan Kampung Sri Parit 3, Bandar Baru Lukut, 71010 Port Dickson, Negeri Sembilan', 2.552310152259596, 101.85075993830561, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(4, 'Sky Ladder Pineapple Farm, Port Dickson', 'Lot 2273 Jalan Kampung Sri Parit 3, Bandar Baru Lukut, 71010 Port Dickson, Negeri Sembilan', 2.552310152259596, 101.85075993830561, 'Mon-Fri 9-5', '60176173633', NOW(), NOW());

-- ============================================
-- MELAKA (User ID: 5 - Farm, User ID: 6 - Shop)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(5, 'entrepreneur', 'Nenas Sedap MD2 & CRYSTAL', 'nenassedapmd2crystal@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60163751793', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW()),
(6, 'entrepreneur', 'Bee Bee Pineapple Tart House', 'beebeepineappletarthouse@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60126149941', '010203040506', 'other', 'Pineapple Retail', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(5, 'Nenas Sedap MD2 & CRYSTAL', '12 acres', '2559, Jalan Simpang Kendong 1, 78000 Alor Gajah, Melaka', 2.488066871930043, 102.1810732303724, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(6, 'Bee Bee Pineapple Tart House', '307A, Jln Parameswara, Kampung Bandar Hilir, 75000 Melaka', 2.1892231809195275, 102.26299488196378, 'Mon-Fri 9-5', '60126149941', NOW(), NOW());

-- ============================================
-- KEDAH (User ID: 7)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(7, 'entrepreneur', 'Ani Pineapple Farm Changlun', 'anipineapplefarmchanglun@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60142305037', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(7, 'Ani Pineapple Farm Changlun', '8 acres', 'NO 54, LRG TOK KESOB, MUKIM, KAMPUNG DARAT, 06010 Changlun, Kedah', 6.397366313856132, 100.45361769918343, NOW(), NOW());

-- ============================================
-- PERLIS (User ID: 8)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(8, 'entrepreneur', 'Ladang Nanas GG Eco Farm', 'ladangnanasggecofarm@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60123456789', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(8, 'Ladang Nanas GG Eco Farm', '25 acres', 'Wang Kelian, 02200 Kaki Bukit, Perlis', 6.6931901518743455, 100.1946080666439, NOW(), NOW());

-- ============================================
-- PERAK (User ID: 9 - Farm, User ID: 10 - Shop)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(9, 'entrepreneur', 'Reka Maju Plantation', 'rekamajuplantation@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60193541660', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW()),
(10, 'entrepreneur', 'Nenas Kak Teh', 'nenaskakteh@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60134567892', '010203040506', 'other', 'Pineapple Retail', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(9, 'Reka Maju Plantation ( RMP )', '19 acres', 'Lot 5676, Jln Pacat Utama, Kampung Lempur, 33800 Kuala Kangsar, Perak', 4.6581908632812485, 100.90457063408776, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(10, 'Nenas Kak Teh', 'Kampung Protan, 34400 Simpang Empat Semanggol, Perak', 4.917667728642469, 100.601970953661, 'Mon-Fri 9-5', '60134567892', NOW(), NOW());

-- ============================================
-- PENANG (User ID: 11)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(11, 'entrepreneur', 'Penang Tropical Fruit Farm', 'penangtropicalfruitfarm@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60124971931', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(11, 'Penang Tropical Fruit Farm', '14 acres', '18th Mile, Stone, Jalan Teluk Bahang, Teluk Bahang, 11050 George Town, Penang', 5.414617856739991, 100.21734533594535, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(11, 'Penang Tropical Fruit Farm', '18th Mile, Stone, Jalan Teluk Bahang, Teluk Bahang, 11050 George Town, Penang', 5.414617856739991, 100.21734533594535, 'Mon-Fri 9-5', '60124971931', NOW(), NOW());

-- ============================================
-- KELANTAN (User ID: 12)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(12, 'entrepreneur', 'Ladang Nenas MD2 ICool Pine', 'ladangnenasmd2icoolpine@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60129693426', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(12, 'Ladang Nenas MD2 ICool Pine, KBe Valley', '16 acres', '18000 Kuala Krai, Kelantan', 5.640345693563874, 102.16236212430812, NOW(), NOW());

-- ============================================
-- TERENGGANU (User ID: 13 - Farm, User ID: 14 - Shop)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(13, 'entrepreneur', 'Lembaga Perindustrian Nanas Malaysia Negeri Terengganu', 'lembagaperindustriannanasmalaysiaterengganu@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '096572767', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW()),
(14, 'entrepreneur', 'Saidati Kedai Nenas MD2 Trg', 'saidatikedainenasmd2trg@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60189846022', '010203040506', 'other', 'Pineapple Retail', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(13, 'Lembaga Perindustrian Nanas Malaysia Negeri Terengganu - Bahagian Pembangunan Teknologi Nanas', '20 acres', 'LEMBAGA PERINDUSTRIAN NANAS MALAYSIA TERENGGANU, Kampung Sungai Tong, 21500 Sungai Tong, Terengganu', 5.365765794647002, 102.87875402193194, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(14, 'Saidati Kedai Nenas MD2 Trg', 'Lot 28955, Jalan Kampung Batin, 21300 Kuala Terengganu, Terengganu', 5.34451210973503, 103.12263006663387, 'Mon-Fri 9-5', '60189846022', NOW(), NOW());

-- ============================================
-- PAHANG (User ID: 15 - Shop only)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(15, 'entrepreneur', 'KEDAI NENAS MD2 KERATONG 4', 'kedainenasmd2keratong4@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60176958930', '010203040506', 'other', 'Pineapple Retail', 'approved', 1, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(15, 'KEDAI NENAS MD2 KERATONG 4', 'no 2 simpang tiga klinik felda keratong 4 BANDAR TUN ABDUL RAZAK, 26900 pahang, Pahang', 2.903572598324776, 102.89980936847431, 'Mon-Fri 9-5', '60176958930', NOW(), NOW());

-- ============================================
-- SABAH (User ID: 16 - Farm and Shop)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(16, 'entrepreneur', 'Ladang Nenas Sirung Pine Agro Valley', 'ladangnenassirungpineagrovalley@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60168358914', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(16, 'Ladang Nenas Sirung Pine Agro Valley', '10 acres', '89300 Kundasang, Sabah', 5.907863259272824, 116.5476478819823, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(16, 'Ladang Nenas Sirung Pine Agro Valley', '89300 Kundasang, Sabah', 5.907863259272824, 116.5476478819823, 'Mon-Fri 9-5', '60168358914', NOW(), NOW());

-- ============================================
-- SARAWAK (User ID: 17 - Farm and Shop)
-- ============================================
INSERT INTO users (id, role, name, email, password_hash, phone, ic_passport, gender, business_category, approval_status, email_verified, created_at, updated_at) VALUES
(17, 'entrepreneur', 'TG Agro Fruits Pineapple Farm', 'tgagrofruitspineapplefarm@gmail.com', '$2y$10$ibg1NFJ08xJXyZLHnFpZo.jl3/U.42MLo58/1GLIos2Sh/5qLuHtC', '60128436616', '010203040506', 'other', 'Pineapple Farming', 'approved', 1, NOW(), NOW());

INSERT INTO farms (user_id, farm_name, farm_size, address, latitude, longitude, created_at, updated_at) VALUES
(17, 'TG Agro Fruits Pineapple Farm (Ladang Nanas TG Agro Fruits)', '17 acres', 'Lot 174, Lambir Land District, 98000 Miri, Sarawak', 4.272570546664004, 113.95067860524952, NOW(), NOW());

INSERT INTO shops (user_id, shop_name, address, latitude, longitude, operation_hours, contact, created_at, updated_at) VALUES
(17, 'TG Agro Fruits Pineapple Farm (Ladang Nanas TG Agro Fruits)', 'Lot 174, Lambir Land District, 98000 Miri, Sarawak', 4.272570546664004, 113.95067860524952, 'Mon-Fri 9-5', '60128436616', NOW(), NOW());

-- ============================================
-- Summary:
-- Total Users: 17 entrepreneurs (IDs 2-17)
-- Total Farms: 12 farms
-- Total Shops: 11 shops
-- All users are approved and email verified
-- ============================================

