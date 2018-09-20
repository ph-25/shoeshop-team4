<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [   'id'=>1,
                'brand_id'=>1,
                'name'=>"GIÀY TÂY GT18",
                'price'=>"695000",
                'content'=>"Giày tây GT18 với thiết kế phần mũ giày trơn đơn giản, chú trọng chi tiết vá bên với đường chỉ chần kỹ lưỡng, đẹp mắt, xứng tầm đi cùng bộ trang phục nơi công sở hay những buổi tiệc quan trọng của Quý ông.
                            - Chất liệu: Da bò.
                            - Chất liệu lót: Da.
                            - Chất liệu đế: Cao su.",
                'color'=>"Đen; Nâu",
                'image'=>"photo",
                'size'=>"38;39;40;41;42;43",
                'sex'=>1,
                'quantity'=>10],
            [   'id'=>2,
                'brand_id'=>1,
                'name'=>"GIÀY TÂY GT750",
                'price'=>"835000",
                'content'=>"Giày tây GT750 kiểu buộc dây trẻ trung, nền vân da ngang sang trọng cùng thiết kế may viền mũi giày. Mang đến quý ông sự chuẩn mực hoàn hảo khi kết hợp cùng bộ cánh công sở của mình.
                            - Chất liệu lót: Da.
                            - Chất liệu đế: Cao su.",
                'color'=>"Đen;Nâu;Bò",
                'image'=>"photo",
                'size'=>"38;39;40;41;42;43",
                'sex'=>1,
                'quantity'=>10],
            [   'id'=>3,
                'brand_id'=>3,
                'name'=>"GIÀY THỂ THAO GTTĐQ 577-01",
                'price'=>"335000",
                'content'=>"Giày thể thao BQ577 với chất da cao cấp, mang đến phong cách thời trang chất riêng, năng động cho các chàng trai, đặc biệt đối với những chàng ưu thích sự xê dịch, chắc chắn không thể bỏ lỡ item này.
                            - Chất liệu: Vải nỉ phối da tổng hợp
                            - Chất liệu lót: Da tổng hợp, vải mềm
                            - Chất liệu đế: Cao su",
                'color'=>"Đen;Xám;Xanh",
                'image'=>"photo",
                'size'=>"38;39;40;41;42",
                'sex'=>1,
                'quantity'=>10],
            [   'id'=>4,
                'brand_id'=>3,
                'name'=>"GIÀY THỂ THAO GTTĐQ 577-04",
                'price'=>"365000",
                'content'=>"Giày thể thao BQ577 mang đến phong cách năng động của tuổi trẻ, dễ dàng kết hợp được mọi trang phục mà vẫn rất thời trang cho nàng.
                            - Chất liệu: Da tổng hợp
                            - Chất liệu lót: Da tổng hợp, vải mềm
                            - Chất liệu đế: Cao su",
                'color'=>"Đen;Trắng",
                'image'=>"photo",
                'size'=>"39;40",
                'sex'=>0,
                'quantity'=>10],
            [   'id'=>5,
                'brand_id'=>3,
                'name'=>"GIÀY LƯỜI GC939",
                'price'=>"675000",
                'content'=>"Giày lười BQ805 kiểu slipper trẻ trung, thiết kế đơn giản, một chút điểm nhấn với 3 lỗ đinh trên giày, phần đế giày siêu nhẹ, cho bước đi quý ông linh hoạt hơn.
                        - Chất liệu: Da nỉ
                        - Chất liệu lót: Da
                        - Chất liệu đế: Cao su",
                'color'=>"Bò;Đen",
                'image'=>"photo",
                'size'=>"38;39",
                'sex'=>1,
                'quantity'=>10],           
         ]);
    }
}
