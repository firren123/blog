<?php  
$goods_array ='8033411,8033408,8033406,8033401,8033399,8033397,8033401,8033397,7961499,7961446,7764899,7948602,
			7818385,7948604,8036257,8036233,7835726,7799760,7758297,8036248,8036245,8037071,8036259,7953594,
			7953493,7953077,8036263,8036243,7719151,7707668,7764940,8037071,8036239,8036237,8036235,8036233,
			8036243,8036245,8036241,8036256,8036248,8036263,8036259,8036257,7945580,7945370,7977657,7979647,
			7992293,7995176,7995175,8000257,8002233,8002222,8000256,8002232,8000258,8002223,8000255,8002229,
			8002227,8002225,8002222,8002230';


select goods_id,is_refund,is_auto_refund from go_goods where goods_id in (8033411,8033408,8033406,8033401,8033399,8033397,8033401,8033397,7961499,7961446,7764899,7948602,7818385,7948604,8036257,8036233,7835726,7799760,7758297,8036248,8036245,8037071,8036259,7953594,7953493,7953077,8036263,8036243,7719151,7707668,7764940,8037071,8036239,8036237,8036235,8036233,8036243,8036245,8036241,8036256,8036248,8036263,8036259,8036257,7945580,7945370,7977657,7979647,7992293,7995176,7995175,8000257,8002233,8002222,8000256,8002232,8000258,8002223,8000255,8002229,8002227,8002225,8002222,8002230);