<?php
// function registerTrainingCoursesField()
// {
//   if (! function_exists('acf_add_local_field_group')) {
//     return;
//   }

//   acf_add_local_field_group(array(
//     'key' => 'group_67c5efee4ea67',
//     'title' => 'Training Courses',
//     'fields' => array(
//       array(
//         'key' => 'field_67c5efee1b796',
//         'label' => 'Courses',
//         'name' => 'courses',
//         'aria-label' => '',
//         'type' => 'repeater',
//         'instructions' => '',
//         'required' => 0,
//         'conditional_logic' => 0,
//         'wrapper' => array(
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ),
//         'layout' => 'row',
//         'pagination' => 0,
//         'min' => 0,
//         'max' => 0,
//         'collapsed' => 'field_67c5effd1b797',
//         'button_label' => 'Add Row',
//         'rows_per_page' => 20,
//         'sub_fields' => array(
//           array(
//             'key' => 'field_67c5effd1b797',
//             'label' => 'Title',
//             'name' => 'title',
//             'aria-label' => '',
//             'type' => 'text',
//             'instructions' => '',
//             'required' => 1,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
//             'default_value' => '',
//             'maxlength' => '',
//             'allow_in_bindings' => 0,
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'parent_repeater' => 'field_67c5efee1b796',
//           ),
//           array(
//             'key' => 'field_67c5f02a1b799',
//             'label' => 'Intro',
//             'name' => 'intro',
//             'aria-label' => '',
//             'type' => 'wysiwyg',
//             'instructions' => '',
//             'required' => 1,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
//             'default_value' => '',
//             'allow_in_bindings' => 0,
//             'tabs' => 'all',
//             'toolbar' => 'full',
//             'media_upload' => 1,
//             'delay' => 0,
//             'parent_repeater' => 'field_67c5efee1b796',
//           ),
//           array(
//             'key' => 'field_67c5f0381b79a',
//             'label' => 'Selling Points',
//             'name' => 'selling_points',
//             'aria-label' => '',
//             'type' => 'group',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
//             'layout' => 'block',
//             'sub_fields' => array(
//               array(
//                 'key' => 'field_67c5f04e1b79b',
//                 'label' => 'Title',
//                 'name' => 'title',
//                 'aria-label' => '',
//                 'type' => 'text',
//                 'instructions' => '',
//                 'required' => 1,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'maxlength' => '',
//                 'allow_in_bindings' => 0,
//                 'placeholder' => '',
//                 'prepend' => '',
//                 'append' => '',
//               ),
//               array(
//                 'key' => 'field_67c5f0561b79c',
//                 'label' => 'Content',
//                 'name' => 'content',
//                 'aria-label' => '',
//                 'type' => 'wysiwyg',
//                 'instructions' => '',
//                 'required' => 1,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'default_value' => '',
//                 'allow_in_bindings' => 0,
//                 'tabs' => 'all',
//                 'toolbar' => 'full',
//                 'media_upload' => 1,
//                 'delay' => 0,
//               ),
//               array(
//                 'key' => 'field_67c5f05f1b79d',
//                 'label' => 'Featured Image',
//                 'name' => 'image',
//                 'aria-label' => '',
//                 'type' => 'image',
//                 'instructions' => '',
//                 'required' => 1,
//                 'conditional_logic' => 0,
//                 'wrapper' => array(
//                   'width' => '',
//                   'class' => '',
//                   'id' => '',
//                 ),
//                 'return_format' => 'array',
//                 'library' => 'all',
//                 'min_width' => '',
//                 'min_height' => '',
//                 'min_size' => '',
//                 'max_width' => '',
//                 'max_height' => '',
//                 'max_size' => '',
//                 'mime_types' => '',
//                 'allow_in_bindings' => 0,
//                 'preview_size' => 'medium',
//               ),
//             ),
//             'parent_repeater' => 'field_67c5efee1b796',
//           ),
//           array(
//             'key' => 'field_67c5f0701b79e',
//             'label' => 'Details',
//             'name' => 'details',
//             'aria-label' => '',
//             'type' => 'wysiwyg',
//             'instructions' => '',
//             'required' => 0,
//             'conditional_logic' => 0,
//             'wrapper' => array(
//               'width' => '',
//               'class' => '',
//               'id' => '',
//             ),
//             'default_value' => '',
//             'allow_in_bindings' => 0,
//             'tabs' => 'all',
//             'toolbar' => 'full',
//             'media_upload' => 1,
//             'delay' => 0,
//             'parent_repeater' => 'field_67c5efee1b796',
//           ),
//         ),
//       ),
//     ),
//     'location' => array(
//       array(
//         array(
//           'param' => 'page',
//           'operator' => '==',
//           'value' => '22',
//         ),
//       ),
//     ),
//     'menu_order' => -1,
//     'position' => 'normal',
//     'style' => 'default',
//     'label_placement' => 'top',
//     'instruction_placement' => 'label',
//     'hide_on_screen' => array(
//       0 => 'the_content',
//     ),
//     'active' => true,
//     'description' => '',
//     'show_in_rest' => 0,
//   ));
// }

// add_action('acf/include_fields', 'registerTrainingCoursesField');
