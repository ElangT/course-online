-- Select All
SELECT C.ak_course_name AS Course, CL.ak_course_level_name AS Level, SC.ak_subcat_name AS Category, CAGE.ak_course_age_name_eng AS Age, CD.ak_course_detail_price AS Price, CD.ak_course_detail_desc AS Desc
FROM ak_course C, ak_course_detail CD, ak_course_level CL, ak_sub_category SC, ak_course_age CAGE, ak_provider P, ak_region R, ak_province PV
WHERE C.ak_course_id = CD.ak_course_id AND CD.ak_course_detail_level = CL.ak_course_level_id AND C.ak_course_cat_id = SC.ak_subcat_id AND CD.ak_course_detail_age = CAGE.ak_course_age_id AND C.ak_course_prov_id = P.ak_provider_id AND P.ak_provider_region = R.ak_region_id AND R.ak_region_prov_id = PV.ak_province_id;

-- Search
-- @param STRING
-- @param MIN
-- @param MAX
-- @param AGE
-- @param LEVEL
SELECT C.ak_course_name AS Course, CL.ak_course_level_name AS Level, SC.ak_subcat_name AS Category, CAGE.ak_course_age_name_eng AS Age, CD.ak_course_detail_price AS Price, CD.ak_course_detail_desc AS Desc, PG.ak_provider_img_path AS Path
FROM ak_course C, ak_course_detail CD, ak_course_level CL, ak_sub_category SC, ak_course_age CAGE, ak_provider P, ak_region R, ak_province PV, ak_provider_img PG
WHERE C.ak_course_id = CD.ak_course_id AND CD.ak_course_detail_level = CL.ak_course_level_id AND C.ak_course_cat_id = SC.ak_subcat_id AND CD.ak_course_detail_age = CAGE.ak_course_age_id AND C.ak_course_prov_id = P.ak_provider_id AND P.ak_provider_region = R.ak_region_id AND R.ak_region_prov_id = PV.ak_province_id AND P.ak_provider_id = PG.ak_provider_id
AND ((R.ak_region_cityname ILIKE '%%') OR
    (R.ak_region_name ILIKE '%%') OR
    (R.ak_region_namefull ILIKE '%%') OR
    (PV.ak_province_name ILIKE '%%') OR
    (PV.ak_province_name_idn ILIKE '%%'))
AND ((CD.ak_course_detail_price >= 0) AND (CD.ak_course_detail_price <= 1000000))
AND ((CAGE.ak_course_age_name_id ILIKE '%%') OR
(CAGE.ak_course_age_name_eng ILIKE '%%'))
AND (CL.ak_course_level_name ILIKE '%%');

SELECT C.ak_course_name AS Course, CL.ak_course_level_name AS Level, SC.ak_subcat_name AS Category, CAGE.ak_course_age_name_eng AS Age, CD.ak_course_detail_price AS Price, CD.ak_course_detail_desc AS Desc
FROM ak_course C, ak_course_detail CD, ak_course_level CL, ak_sub_category SC, ak_course_age CAGE, ak_provider P, ak_region R, ak_province PV
WHERE C.ak_course_id = CD.ak_course_id AND CD.ak_course_detail_level = CL.ak_course_level_id AND C.ak_course_cat_id = SC.ak_subcat_id AND CD.ak_course_detail_age = CAGE.ak_course_age_id AND C.ak_course_prov_id = P.ak_provider_id AND P.ak_provider_region = R.ak_region_id AND R.ak_region_prov_id = PV.ak_province_id
AND ((R.ak_region_cityname ILIKE '%%') OR
    (R.ak_region_name ILIKE '%%') OR
    (R.ak_region_namefull ILIKE '%%') OR
    (PV.ak_province_name ILIKE '%%') OR
    (PV.ak_province_name_idn ILIKE '%%'))
AND ((CD.ak_course_detail_price >= 0) AND (CD.ak_course_detail_price <= 1000000))
AND ((CAGE.ak_course_age_name_id ILIKE '%%') OR
(CAGE.ak_course_age_name_eng ILIKE '%%'))
AND (CL.ak_course_level_name ILIKE '%%');

-- Search
SELECT C.ak_course_name AS Course, CL.ak_course_level_name AS Level, SC.ak_subcat_name AS Category, CAGE.ak_course_age_name_eng AS Age, CD.ak_course_detail_price AS Price, CD.ak_course_detail_desc AS Desc
WHERE C.ak_course_id = CD.ak_course_id AND CD.ak_course_detail_level = CL.ak_course_level_id AND C.ak_course_cat_id = SC.ak_subcat_id AND CD.ak_course_detail_age = CAGE.ak_course_age_id AND C.ak_course_prov_id = P.ak_provider_id AND P.ak_provider_region = R.ak_region_id AND R.ak_region_prov_id = PV.ak_province_id
FROM ak_course C, ak_course_detail CD, ak_course_level CL, ak_sub_category SC, ak_course_age CAGE, ak_provider P, ak_region R, ak_province PV
AND ((R.ak_region_cityname LIKE '%X%') OR (R.ak_region_name LIKE '%X%') OR (R.ak_region_namefull LIKE '%X%') OR (PV.ak_province_name LIKE '%X%') OR (PV.ak_province_name_idn LIKE '%X%'))
AND ((CD.ak_course_detail_price >= 0) AND (CD.ak_course_detail_price <= 1000000))
AND ((CAGE.ak_course_age_name_id LIKE '%AGE%') OR (CAGE.ak_course_age_name_eng LIKE '%AGE%'))
AND (CL.ak_course_level_name LIKE '%LEVEL%');

SELECT C.ak_course_name AS Course, CL.ak_course_level_name AS Level,
    SC.ak_subcat_name AS Category, CAGE.ak_course_age_name_eng AS Age,
    CD.ak_course_detail_price AS Price, CD.ak_course_detail_desc AS Desc
FROM ak_course C, ak_course_detail CD, ak_course_level CL, ak_sub_category SC, ak_course_age CAGE, ak_provider P, ak_region R, ak_province PV
WHERE C.ak_course_id = CD.ak_course_id AND
    CD.ak_course_detail_level = CL.ak_course_level_id AND
    C.ak_course_cat_id = SC.ak_subcat_id AND
    CD.ak_course_detail_age = CAGE.ak_course_age_id AND
    C.ak_course_prov_id = P.ak_provider_id AND
    P.ak_provider_region = R.ak_region_id AND
    R.ak_region_prov_id = PV.ak_province_id
AND ((R.ak_region_cityname LIKE '%X%') OR (R.ak_region_name LIKE '%X%') OR (R.ak_region_namefull LIKE '%X%') OR (PV.ak_province_name LIKE '%X%') OR (PV.ak_province_name_idn LIKE '%X%'))
AND ((CD.ak_course_detail_price >= min) AND (CD.ak_course_detail_price <= max))
AND ((CAGE.ak_course_age_name_id LIKE '%AGE%') OR (CAGE.ak_course_age_name_eng LIKE '%AGE%'))
AND (CL.ak_course_level_name LIKE '%LEVEL%');
