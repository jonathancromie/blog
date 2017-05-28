<?php

use Illuminate\Database\Seeder;

// use DateTime;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new \DateTime();

        DB::table('posts')->insert([
            'user_id' => 1,
            'active' => 0,
            'title' => 'Lorem Ipsum',
            'body' => htmlspecialchars('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec porta erat. Sed nunc ante, volutpat eget massa sed, condimentum scelerisque sapien. Sed posuere, eros at placerat euismod, ligula justo porta nisi, ut feugiat nisl urna ac dolor. Morbi ac libero placerat, congue magna vitae, consequat enim. Cras pulvinar mattis dolor, consectetur rutrum nulla mattis sit amet. Nam ut orci a massa iaculis ultrices. Aenean vulputate mattis purus, et sagittis tortor vehicula eu. Nulla facilisi.

Integer laoreet ornare dui eu ornare. Sed nec risus blandit, semper purus non, eleifend dolor. Mauris nec ante semper, cursus ante vitae, hendrerit lacus. Etiam mattis tortor quis dui iaculis, at suscipit tortor sagittis. Vivamus molestie magna sit amet risus vulputate gravida. Cras efficitur congue risus ut iaculis. Phasellus ut luctus lorem. Maecenas sit amet facilisis justo, id vulputate nibh. Phasellus ullamcorper malesuada justo a gravida. In lacus lectus, sodales ut molestie non, tincidunt eget justo. Cras sed vehicula odio, eget laoreet nisl. Quisque lacus massa, hendrerit non nisl non, commodo mollis elit. Vestibulum tellus dolor, tempus eu dictum in, ultrices a dolor.

Etiam imperdiet nisl et iaculis rutrum. Suspendisse luctus ultrices magna sed pretium. Nunc laoreet, est nec maximus scelerisque, lorem orci euismod arcu, quis egestas mauris augue eu lorem. Phasellus et pulvinar nisi. Donec quis tellus sed metus congue porttitor. Donec a ullamcorper nibh. Vestibulum fringilla dui nec mi condimentum gravida. Aenean et nulla nec nulla condimentum dignissim. Integer placerat, arcu ac dapibus pulvinar, purus mi volutpat augue, ut iaculis arcu est at magna. Mauris ut lobortis purus, id euismod justo. Sed ultricies, tellus sit amet tincidunt volutpat, justo elit sodales est, sed eleifend velit eros id sapien. Aliquam in ligula molestie, molestie dolor vitae, varius mi. Suspendisse quis ligula vel metus tincidunt maximus.

Sed ac tellus tempor, sodales mi quis, porta libero. Vivamus volutpat vehicula rhoncus. Etiam pellentesque tempor tellus, sit amet hendrerit mi convallis ut. Duis malesuada lorem odio, posuere rhoncus risus hendrerit consequat. Sed euismod urna eleifend magna viverra, ac mollis magna aliquam. Aliquam pretium molestie consequat. Nulla a elit rhoncus, rhoncus nisi ac, blandit nisl. Duis ex neque, feugiat et elit pharetra, pharetra dignissim sem. Donec euismod lorem purus, eu egestas mauris vehicula malesuada. Praesent placerat imperdiet odio, id congue elit viverra sit amet. Sed tortor est, accumsan non dictum a, varius non eros. Curabitur et fermentum felis. Aliquam leo nulla, pretium at rhoncus ac, gravida vitae urna. Suspendisse faucibus neque ipsum, vitae ullamcorper ipsum mollis id. Ut posuere aliquam vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Nam vestibulum turpis odio, quis molestie massa blandit ac. Nam facilisis nulla lacus, vel vulputate ex pellentesque a. Nulla facilisi. Duis lobortis sapien non augue consectetur malesuada. Nullam sit amet semper arcu. Donec interdum magna eu laoreet dignissim. Sed consequat bibendum erat, at faucibus magna tempus non. Suspendisse ac lorem in sapien mattis tincidunt. Curabitur in mauris felis. Ut imperdiet, sem at porttitor finibus, ex nisl tempus dui, sed finibus libero turpis iaculis ipsum. Mauris ac odio et turpis suscipit pretium.', ENT_QUOTES),
            'published_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
