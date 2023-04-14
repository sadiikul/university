<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $role = Role::create(['name' => 'admin']);

        $permissions = [
            [
                'group_name' => 'dashboard',
                'permission' => [
                    'dashboard.view'
                ]
            ],
            [
                'group_name' => 'department',
                'permission' => [
                    'department.view',
                    'department.create',
                    'department.edit',
                    'department.delete',
                ]
            ],
            [
                'group_name' => 'department_slider',
                'permission' => [
                    'department_slider.view',
                    'department_slider.create',
                    'department_slider.edit',
                    'department_slider.delete',
                ]
            ],
            [
                'group_name' => 'department_gallery',
                'permission' => [
                    'department_gallery.view',
                    'department_gallery.create',
                    'department_gallery.delete',
                ]
            ],
            [
                'group_name' => 'program_category',
                'permission' => [
                    'program_category.view',
                    'program_category.create',
                    'program_category.edit',
                    'program_category.delete',
                ]
            ],
            [
                'group_name' => 'program_list',
                'permission' => [
                    'program_list.view',
                    'program_list.create',
                    'program_list.edit',
                    'program_list.delete',
                ]
            ],
            [
                'group_name' => 'curriculum',
                'permission' => [
                    'curriculum.view',
                    'curriculum.create',
                    'curriculum.edit',
                    'curriculum.delete',
                ]
            ],
            [
                'group_name' => 'schedule',
                'permission' => [
                    'schedule.view',
                    'schedule.create',
                    'schedule.edit',
                    'schedule.delete',
                ]
            ],
            [
                'group_name' => 'credit_hour',
                'permission' => [
                    'credit_hour.view',
                    'credit_hour.create',
                    'credit_hour.edit',
                    'credit_hour.delete',
                ]
            ],
            [
                'group_name' => 'subject_details',
                'permission' => [
                    'subject_details.view',
                    'subject_details.create',
                    'subject_details.edit',
                    'subject_details.delete',
                ]
            ],
            [
                'group_name' => 'tuition_fee',
                'permission' => [
                    'tuition_fee.view',
                    'tuition_fee.create',
                    'tuition_fee.edit',
                    'tuition_fee.delete',
                ]
            ],
            [
                'group_name' => 'rnd',
                'permission' => [
                    'rnd.head',
                    'rnd.view',
                    'rnd.create',
                    'rnd.edit',
                    'rnd.delete',
                ]
            ],
            [
                'group_name' => 'rnd_gallery',
                'permission' => [
                    'rnd_gallery.view',
                    'rnd_gallery.create',
                    'rnd_gallery.edit',
                    'rnd_gallery.delete',
                ]
            ],
            [
                'group_name' => 'faculty',
                'permission' => [
                    'faculty.view',
                    'faculty.create',
                    'faculty.edit',
                    'faculty.delete',
                ]
            ],
            [
                'group_name' => 'admission_thumbnail',
                'permission' => [
                    'admission_thumbnail.edit',
                ]
            ],
            [
                'group_name' => 'admission_page',
                'permission' => [
                    'admission_page.edit',
                ]
            ],
            [
                'group_name' => 'foreign',
                'permission' => [
                    'foreign.head',
                    'foreign.view',
                    'foreign.create',
                    'foreign.edit',
                    'foreign.delete',
                ]
            ],
            [
                'group_name' => 'waiver',
                'permission' => [
                    'waiver.head',
                    'waiver.view',
                    'waiver.create',
                    'waiver.edit',
                    'waiver.delete',
                    'waiver_feedback.view',
                    'waiver_feedback.delete'
                ]
            ],
            [
                'group_name' => 'accommodation',
                'permission' => [
                    'accommodation.edit',
                ]
            ],
            [
                'group_name' => 'calender',
                'permission' => [
                    'calender.view',
                    'calender.create',
                    'calender.edit',
                    'calender.delete',
                ]
            ],
            [
                'group_name' => 'management_thumbnail',
                'permission' => [
                    'management_thumbnail.edit',
                ]
            ],
            [
                'group_name' => 'board_member',
                'permission' => [
                    'board_member.view',
                    'board_member.create',
                    'board_member.edit',
                    'board_member.delete',
                ]
            ],
            [
                'group_name' => 'syndicate',
                'permission' => [
                    'syndicate.head',
                    'syndicate.view',
                    'syndicate.create',
                    'syndicate.edit',
                    'syndicate.delete',
                ]
            ],
            [
                'group_name' => 'academic_council',
                'permission' => [
                    'academic_council.head',
                    'academic_council.view',
                    'academic_council.create',
                    'academic_council.edit',
                    'academic_council.delete',
                ]
            ],

            [
                'group_name' => 'chancellor',
                'permission' => [
                    'vice.edit',
                    'pro_vice.edit',
                ]
            ],
            [
                'group_name' => 'administration',
                'permission' => [
                    'administration.view',
                    'administration.create',
                    'administration.edit',
                    'administration.delete',
                ]
            ],
            [
                'group_name' => 'alumni',
                'permission' => [
                    'alumni.view',
                    'alumni.create',
                    'alumni.edit',
                    'alumni.delete',
                ]
            ],
            [
                'group_name' => 'notice',
                'permission' => [
                    'notice.view',
                    'notice.create',
                    'notice.edit',
                    'notice.delete',
                ]
            ],
            [
                'group_name' => 'news_event',
                'permission' => [
                    'news_event.view',
                    'news_event.create',
                    'news_event.edit',
                    'news_event.delete',
                ]
            ],
            [
                'group_name' => 'seminar',
                'permission' => [
                    'seminar.view',
                    'seminar.create',
                    'seminar.edit',
                    'seminar.delete',
                ]
            ],
            [
                'group_name' => 'club',
                'permission' => [
                    'club.view',
                    'club.create',
                    'club.edit',
                    'club.delete',
                ]
            ],
            [
                'group_name' => 'partner',
                'permission' => [
                    'partner.view',
                    'partner.create',
                    'partner.edit',
                    'partner.delete',
                ]
            ],
            [
                'group_name' => 'internationl_affairs',
                'permission' => [
                    'internationl_affairs.view',
                    'internationl_affairs.create',
                    'internationl_affairs.edit',
                    'internationl_affairs.delete',
                ]
            ],
            [
                'group_name' => 'career',
                'permission' => [
                    'career.form',
                    'career.view',
                    'career.create',
                    'career.edit',
                    'career.delete',
                ]
            ],
            [
                'group_name' => 'counter',
                'permission' => [
                    'counter.edit',
                ]
            ],
            [
                'group_name' => 'subscriber',
                'permission' => [
                    'subscriber.view',
                    'subscriber.delete',
                ]
            ],
            [
                'group_name' => 'about',
                'permission' => [
                    'about.head',
                    'about.view',
                    'about.create',
                    'about.edit',
                    'about.delete',
                ]
            ],
            [
                'group_name' => 'message',
                'permission' => [
                    'message.view',
                    'message.delete',
                ]
            ],
            [
                'group_name' => 'setting',
                'permission' => [
                    'logo.edit',
                    'slider.view',
                    'slider.create',
                    'slider.edit',
                    'slider.delete',
                    'gallery.view',
                    'gallery.create',
                    'gallery.delete',
                    'marquee.edit',
                    'content.edit',
                    'seo.edit',
                    'custom.edit',
                    'contact.edit',
                    'social_link.view',
                    'social_link.create',
                    'social_link.edit',
                    'social_link.delete',
                    'other.view',
                    'other.create',
                    'other.edit',
                    'other.delete',
                    'menu.edit',
                    'home_customize.edit',
                    'email_config.edit',
                ]
            ],

            [
                'group_name' => 'user',
                'permission' => [
                    'user.view',
                    'user.create',
                    'user.edit',
                    'user.delete',
                ]
            ],
            [
                'group_name' => 'role',
                'permission' => [
                    'role.view',
                    'role.create',
                    'role.edit',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'permission',
                'permission' => [
                    'permission.view',
                    'permission.create',
                    'permission.edit',
                    'permission.delete',
                ]
            ]
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $groupName = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permission']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permission'][$j], 'group_name' => $groupName]);
                $role->givePermissionTo($permission);
                $permission->assignRole($role);
            }
        }
    }
}
