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
                'brand_id'=>"1",
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
                'brand_id'=>"1",
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
                'brand_id'=>"3",
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
                'brand_id'=>"3",
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
                'brand_id'=>"3",
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
            [   'id'=>6,
                'brand_id'=>"3",
                'name'=>"GIÀY LƯỜI GCV10",
                'price'=>"335000",
                'content'=>"Giày lười BQ965 với màu sắc và kiểu dáng dễ thương, chất da mềm mang êm chân, bạn gái dễ dàng phối cùng mọi trang phục, và năng động hơn trong mỗi bước chuyển.
                        - Chất liệu: Da tổng hợp
                        - Chất liệu lót: Da tổng hợp
                        - Chất liệu đế: Cao su",
                'color'=>"Kem;Bò",
                'image'=>"photo",
                'size'=>"36",
                'sex'=>0,
                'quantity'=>10],
            [   'id'=>7,
                'brand_id'=>"4",
                'name'=>"GIÀY SLIP-ON GTTBQ006",
                'price'=>"295000",
                'content'=>"Giày Slip-on BQ526 mang kiểu dáng slip-on, đem đến sự tiện lợi và thời trang cho các chàng trai.
                            - Chất liệu: Vải
                            - Chất liệu lót: Vải
                            - Chất liệu đế: TPR",
                'color'=>"Xám",
                'image'=>"photo",
                'size'=>"39;40;41;42;43",
                'sex'=>1,
                'quantity'=>10],
            [   'id'=>8,
                'brand_id'=>"4",
                'name'=>"GIÀY SLIP-ON GC031S",
                'price'=>"255000",
                'content'=>"Giày Slip-on BQ671 mang kiểu dáng slip-on, đem đến sự tiện lợi và thời trang cho bạn gái.
                            - Chất liệu: Vải
                            - Chất liệu lót: Vải
                            - Chất liệu đế: TPR",
                'color'=>"Xanh;Đen;Xám;Bò",
                'image'=>"photo",
                'size'=>"38",
                'sex'=>0,
                'quantity'=>10],
            [   'id'=>9,
                'brand_id'=>"5",
                'name'=>"GIÀY CAO GÓT GB8005",
                'price'=>"345000",
                'content'=>"Giày cao gót BQ kiểu nền da trơn, chất mờ, vá mũ giày góc tam giác, gót giày nhọn vừa phải tạo độ vững chắc trên từng bước chuyển của quý cô.
                            - Chất liệu: Da tổng hợp
                            - Chất liệu lót: Da tổng hợp
                            - Chất liệu đế: Su
                            - Chiều cao: 7 cm",
                'color'=>"Đỏ",
                'image'=>"photo",
                'size'=>"35;36;39",
                'sex'=>0,
                'quantity'=>10],
            [   'id'=>10,
                'brand_id'=>"5",
                'name'=>"GIÀY CAO GÓT GB 229326",
                'price'=>"465000",
                'content'=>"Với thiết kế đế trụ Meca trong suốt và chất liệu si bóng. Giày cao gót GB 229326 nổi bật lên bởi sự tinh tế và hiện đại, lót giày làm từ si cao cấp mang lại sự êm ái dễ chịu nhất cho đôi chân của bạn, có ba sự lựa chọn về màu sắc là đen, kem và xám cho bạn gái thỏa thích phối cùng các loại trang phục.
                            - Chất liệu : Da tổng hợp
                            - Chất liệu lót: Si cao cấp
                            - Chất liệu đế: Cao su
                            - Chiều cao: 5 cm",
                'color'=>"Kem;Đen;Xám",
                'image'=>"photo",
                'size'=>"35;36;37;38;39",
                'sex'=>0,
                'quantity'=>10]
        ]);
    }
}
