<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class blog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // function endcode_Image($path){
        //     $pathFile = public_path($path);
        //     $imageData = file_get_contents($pathFile);
        //     $base64Image = base64_encode($imageData);
        //         return $base64Image;
        //     }
        
        DB::table('blog')->insert([
            'image_banner' => end_code_imageBase64('blog/blog_1/image_banner.jpg'),
            'title' => 'Những Dự Đoán Về iPhone 16',
            'image_main' => end_code_imageBase64('blog/blog_1/image_main.jpg'),
            'content_1' => '
                Kể từ khi Apple ra mắt iPhone đầu tiên vào năm 2007, mỗi phiên bản mới của dòng sản phẩm này đều mang lại những cải tiến và đổi mới đáng kể. Đã gần một năm kể từ khi iPhone 15 được giới thiệu, và dù iPhone 16 còn chưa được công bố chính thức, cộng đồng công nghệ đã bắt đầu rộ lên những suy đoán và dự đoán về những tính năng và cải tiến mà mẫu iPhone tiếp theo sẽ mang lại. Hãy cùng khám phá một số giả thuyết hấp dẫn về iPhone 16.

                Thiết Kế Mới và Đột Phá
                Apple luôn chú trọng đến thiết kế và trải nghiệm người dùng. Với iPhone 16, có thể chúng ta sẽ thấy một thiết kế hoàn toàn mới. Các nguồn tin dự đoán rằng iPhone 16 có thể có kiểu dáng mỏng hơn, nhẹ hơn và có khung viền mỏng hơn nữa, đồng thời duy trì độ bền và chất lượng cao. Sự xuất hiện của các màu sắc mới và vật liệu thân thiện với môi trường cũng có thể là điểm nhấn.

                Màn Hình và Công Nghệ Hiển Thị
                Màn hình luôn là một yếu tố quan trọng trên iPhone. Dự đoán rằng iPhone 16 sẽ tiếp tục nâng cấp công nghệ hiển thị với khả năng hỗ trợ độ phân giải cao hơn và tần số quét màn hình nhanh hơn, mang lại trải nghiệm hình ảnh sắc nét và mượt mà hơn. Công nghệ OLED và ProMotion có thể sẽ được cải tiến để cải thiện độ sáng và độ tương phản.

                Hiệu Năng Tăng Cường
                Với mỗi thế hệ iPhone mới, Apple luôn trang bị cho thiết bị của mình các con chip mạnh mẽ hơn. iPhone 16 có thể sẽ được trang bị vi xử lý mới nhất, với khả năng xử lý nhanh hơn và hiệu suất năng lượng tốt hơn. Các vi xử lý này sẽ không chỉ cải thiện tốc độ hoạt động mà còn hỗ trợ các ứng dụng và trò chơi đòi hỏi tài nguyên cao hơn.
                ',

            'content_2'=>'
                Cải Tiến Về Camera
                Camera là một trong những yếu tố quan trọng đối với người dùng iPhone. Với iPhone 16, chúng ta có thể mong đợi các cải tiến lớn trong công nghệ camera. Tính năng chụp ảnh và quay video có thể được nâng cấp với cảm biến lớn hơn, khả năng quay video 8K, và cải tiến công nghệ xử lý hình ảnh AI để mang lại những bức ảnh sắc nét và chân thực hơn.

                Tính Năng Kết Nối và Tương Thích
                Apple có thể tiếp tục mở rộng tính năng kết nối trên iPhone 16. Điều này có thể bao gồm việc cải thiện kết nối 5G, hỗ trợ các băng tần mới và tốc độ tải xuống cao hơn. Bên cạnh đó, iPhone 16 có thể sẽ đi kèm với các tính năng mới về bảo mật và kết nối không dây, chẳng hạn như Bluetooth 5.3 và khả năng tương thích với các thiết bị và phụ kiện mới.

                Pin và Sạc
                Một yếu tố không thể thiếu là cải thiện hiệu suất pin. iPhone 16 có thể được trang bị pin có dung lượng lớn hơn và công nghệ sạc nhanh hơn. Apple có thể cũng sẽ giới thiệu các phương pháp sạc không dây và sạc ngược mới để nâng cao tiện ích và khả năng sử dụng.

                Kết Luận

                Dù các dự đoán về iPhone 16 hiện tại chỉ dựa trên các tin đồn và thông tin rò rỉ, rõ ràng là Apple đang tiếp tục nỗ lực để đổi mới và mang lại những trải nghiệm tốt nhất cho người dùng. Với các cải tiến về thiết kế, hiệu năng, camera và tính năng kết nối, iPhone 16 hứa hẹn sẽ là một sản phẩm đáng mong đợi. Chúng ta cùng chờ xem những thông tin chính thức từ Apple để biết được những điều bất ngờ mà iPhone 16 sẽ mang lại!                
            
            ',

            'image_sub1' => end_code_imageBase64('blog/blog_1/image_sub1.jpg'),
            'image_sub2' => end_code_imageBase64('blog/blog_1/image_sub1.jpg'),
            'slug' => 'nhung-du-doan-ve-iphone-16'
        ]);
        
    }
}
