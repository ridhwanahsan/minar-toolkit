<?php
namespace minar_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if (! defined('ABSPATH')) {
    exit;
}

class vanish_2 extends Widget_Base
{
    public function get_name()
    {
        return 'vanish_2';
    }

    public function get_title()
    {
        return __('Vanish 2', 'minar-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-elementor';
    }

    public function get_categories()
    {
        return ['minar'];
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
    }

    protected function register_controls_section()
    {
        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'content_heading',
            [
                'label' => __('Texts', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Let something go for today.', 'minar-toolkit'),
                'placeholder' => __('Enter title', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'       => __('Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Write what\'s been bothering you? When you\'re ready, we\'ll let it vanish together.', 'minar-toolkit'),
                'placeholder' => __('Enter subtitle', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'placeholder_text',
            [
                'label'       => __('Placeholder Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Type anything that feels heavy right now...', 'minar-toolkit'),
                'placeholder' => __('Enter placeholder', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __('Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Let it vanish', 'minar-toolkit'),
                'placeholder' => __('Enter button text', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'disclaimer',
            [
                'label'       => __('Disclaimer', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Nothing written here is saved or stored. It disappears from this page.', 'minar-toolkit'),
                'placeholder' => __('Enter disclaimer', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $this->add_control(
            'final_buttons_heading',
            [
                'label' => __('Final Buttons', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'calm_button_text',
            [
                'label'       => __('Calm Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Return to calm', 'minar-toolkit'),
                'placeholder' => __('Enter calm button text', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'calm_button_url',
            [
                'label'       => __('Calm Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
            ]
        );

        $this->add_control(
            'soft_button_text',
            [
                'label'       => __('Soft Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Find something soft to do', 'minar-toolkit'),
                'placeholder' => __('Enter soft button text', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'soft_button_url',
            [
                'label'       => __('Soft Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
            ]
        );

        $this->add_control(
            'guidance_texts_heading',
            [
                'label' => __('Guidance Texts (JS)', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'vanish_msg_1',
            [
                'label'       => __('Step 1 Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('It’s gone from here.', 'minar-toolkit'),
                'placeholder' => __('Enter step 1 text', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'vanish_msg_2',
            [
                'label'       => __('Step 2 Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Take a slow, deep breath.', 'minar-toolkit'),
                'placeholder' => __('Enter step 2 text', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'vanish_msg_3',
            [
                'label'       => __('Step 3 Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Inhale for 4 seconds. Hold for 4 seconds. Exhale for 6 seconds.', 'minar-toolkit'),
                'placeholder' => __('Enter step 3 text', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $this->add_control(
            'vanish_final_quote',
            [
                'label'       => __('Final Quote', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('“This feeling is valid, but temporary.”', 'minar-toolkit'),
                'placeholder' => __('Enter final quote', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );
        
        $this->add_control(
            'post_submit_toggles',
            [
                'label' => __('Post-Submit Toggles', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'show_msg1',
            [
                'label'        => __('Show Step 1 Text', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_msg2',
            [
                'label'        => __('Show Step 2 Text', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_msg3',
            [
                'label'        => __('Show Step 3 Text', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_final_quote',
            [
                'label'        => __('Show Final Quote', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_final_buttons',
            [
                'label'        => __('Show Final Buttons', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'hide_title_after_submit',
            [
                'label'        => __('Hide Title After Submit', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Hide', 'minar-toolkit'),
                'label_off'    => __('Keep', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'animation_heading',
            [
                'label' => __('Animation & Timing', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'fade_in_duration',
            [
                'label'       => __('Fade-in Duration (seconds)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2.5,
                'min'         => 0.1,
                'step'        => 0.1,
            ]
        );

        $this->add_control(
            'fade_out_duration',
            [
                'label'       => __('Fade-out Duration (seconds)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 1.8,
                'min'         => 0.1,
                'step'        => 0.1,
            ]
        );

        $this->add_control(
            'msg1_duration',
            [
                'label'       => __('Step 1 Hold (ms)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2500,
                'min'         => 0,
                'step'        => 50,
            ]
        );

        $this->add_control(
            'msg2_duration',
            [
                'label'       => __('Step 2 Hold (ms)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3000,
                'min'         => 0,
                'step'        => 50,
            ]
        );

        $this->add_control(
            'msg3_duration',
            [
                'label'       => __('Step 3 Hold (ms)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3500,
                'min'         => 0,
                'step'        => 50,
            ]
        );

        $this->add_control(
            'final_transition_delay',
            [
                'label'       => __('Final Transition Delay (ms)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 800,
                'min'         => 0,
                'step'        => 50,
            ]
        );

        $this->add_control(
            'final_buttons_delay',
            [
                'label'       => __('Final Buttons Show Delay (ms)', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 800,
                'min'         => 0,
                'step'        => 50,
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'section_background',
                'label'    => __('Section Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .vanish',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .vanish__title, {{WRAPPER}} .vanish__message',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __('Title Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .vanish__message' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .vanish__subtitle',
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label'     => __('Subtitle Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'card_border',
                'label'    => __('Card Border', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .vanish__card',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'card_background',
                'label'    => __('Card Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .vanish__card',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'input_typography',
                'selector' => '{{WRAPPER}} .vanish__input',
            ]
        );
        $this->add_control(
            'input_text_color',
            [
                'label'     => __('Input Text Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__input' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'input_placeholder_color',
            [
                'label'     => __('Placeholder Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'selector' => '{{WRAPPER}} .vanish__submit-button',
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label'     => __('Button Text Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__submit-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label'     => __('Button Background', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__submit-button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_hover_bg_color',
            [
                'label'     => __('Button Hover Background', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__submit-button:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'disclaimer_typography',
                'selector' => '{{WRAPPER}} .vanish__disclaimer',
            ]
        );
        $this->add_control(
            'disclaimer_color',
            [
                'label'     => __('Disclaimer Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vanish__disclaimer' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            
        <section class="vanish" id="vanish-<?php echo esc_attr($this->get_id()); ?>">
            <div class="vanish__container container">
                <div class="vanish__content">
                    <h1 class="vanish__title"><?php echo esc_html($settings['title']); ?></h1>
                    <div class="vanish__content-inner">
                        <p class="vanish__subtitle"><?php echo esc_html($settings['subtitle']); ?></p>

                        <div class="vanish__card">
                            <textarea class="vanish__input" placeholder="<?php echo esc_attr($settings['placeholder_text']); ?>"></textarea>

                            <div class="vanish__footer">
                                <button class="vanish__submit-button disabled" disabled><?php echo esc_html($settings['button_text']); ?></button>
                            </div>
                        </div>

                        <p class="vanish__disclaimer"><?php echo esc_html($settings['disclaimer']); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <style>
            #vanish-<?php echo esc_attr($this->get_id()); ?> .fade-in {
                -webkit-animation-duration: <?php echo esc_attr(floatval($settings['fade_in_duration'])); ?>s !important;
                        animation-duration: <?php echo esc_attr(floatval($settings['fade_in_duration'])); ?>s !important;
            }
            #vanish-<?php echo esc_attr($this->get_id()); ?> .fade-out {
                -webkit-animation-duration: <?php echo esc_attr(floatval($settings['fade_out_duration'])); ?>s !important;
                        animation-duration: <?php echo esc_attr(floatval($settings['fade_out_duration'])); ?>s !important;
            }
        </style>

             <script>
                
                /*============== Vanish Submit Btn ========= */
                if (document.querySelector(".vanish__input")) {
                    const input = document.querySelector(".vanish__input");
                    const submitBtn = document.querySelector(".vanish__submit-button");

                    input.addEventListener("input", function () {
                        if (input.value.trim() === "") {
                            submitBtn.setAttribute("disabled", "true");
                            submitBtn.classList.add("disabled");
                        } else {
                            submitBtn.removeAttribute("disabled");
                            submitBtn.classList.remove("disabled");
                        }
                    });
                }

                /*============== Vanish Animation ========= */
                document.addEventListener("DOMContentLoaded", function () {

                    const imgWrap = document.querySelector(".vanish__input");
                    if (!imgWrap) return;

                    const cfg = {
                        msg1: <?php echo json_encode($settings['vanish_msg_1']); ?>,
                        msg2: <?php echo json_encode($settings['vanish_msg_2']); ?>,
                        msg3: <?php echo json_encode($settings['vanish_msg_3']); ?>,
                        finalQuote: <?php echo json_encode($settings['vanish_final_quote']); ?>,
                        toggles: {
                            showMsg1: <?php echo json_encode(!empty($settings['show_msg1']) && $settings['show_msg1'] === 'yes'); ?>,
                            showMsg2: <?php echo json_encode(!empty($settings['show_msg2']) && $settings['show_msg2'] === 'yes'); ?>,
                            showMsg3: <?php echo json_encode(!empty($settings['show_msg3']) && $settings['show_msg3'] === 'yes'); ?>,
                            showFinalQuote: <?php echo json_encode(!empty($settings['show_final_quote']) && $settings['show_final_quote'] === 'yes'); ?>,
                            showFinalButtons: <?php echo json_encode(!empty($settings['show_final_buttons']) && $settings['show_final_buttons'] === 'yes'); ?>,
                            hideTitleAfterSubmit: <?php echo json_encode(!empty($settings['hide_title_after_submit']) && $settings['hide_title_after_submit'] === 'yes'); ?>,
                        },
                        durations: {
                            msg1: <?php echo intval($settings['msg1_duration']); ?>,
                            msg2: <?php echo intval($settings['msg2_duration']); ?>,
                            msg3: <?php echo intval($settings['msg3_duration']); ?>,
                            fadeOut: <?php echo intval($settings['final_transition_delay']); ?>,
                            finalButtonsDelay: <?php echo intval($settings['final_buttons_delay']); ?>,
                        },
                        calmBtnText: <?php echo json_encode($settings['calm_button_text']); ?>,
                        calmBtnUrl: <?php echo json_encode(!empty($settings['calm_button_url']['url']) ? $settings['calm_button_url']['url'] : ''); ?>,
                        softBtnText: <?php echo json_encode($settings['soft_button_text']); ?>,
                        softBtnUrl: <?php echo json_encode(!empty($settings['soft_button_url']['url']) ? $settings['soft_button_url']['url'] : ''); ?>,
                    };

                    const vanishInput = document.querySelector('.vanish__input');
                    const vanishBtn = document.querySelector('.vanish__submit-button');
                    const vanishTitle = document.querySelector('.vanish__title');
                    const vanishSubtitle = document.querySelector('.vanish__subtitle');
                    const vanishCard = document.querySelector('.vanish__card');
                    const vanishDisclaimer = document.querySelector('.vanish__disclaimer');
                    const vanishContent = document.querySelector('.vanish__content-inner');

                    let textStep = 1;

                    const messageEl = (function() {
                        if (cfg.toggles.hideTitleAfterSubmit) {
                            const el = document.createElement('p');
                            el.className = 'vanish__message';
                            vanishContent.insertBefore(el, vanishDisclaimer.nextSibling);
                            return el;
                        }
                        return vanishTitle;
                    })();

                    let btnGroup = null;
                    if (cfg.toggles.showFinalButtons) {
                        btnGroup = document.createElement('div');
                        btnGroup.className = "vanish__final-btns";
                        const calmHref = cfg.calmBtnUrl && cfg.calmBtnUrl.length > 0 ? cfg.calmBtnUrl : '#';
                        const calmExtra = cfg.calmBtnUrl && cfg.calmBtnUrl.length > 0 ? '' : ' onclick="location.reload()"';
                        const softHref = cfg.softBtnUrl && cfg.softBtnUrl.length > 0 ? cfg.softBtnUrl : '#';
                        btnGroup.innerHTML = `
                            <a href="${calmHref}" class="vanish__btn-calm btn btn--primary"${calmExtra}>
                                ${cfg.calmBtnText}
                            </a>
                            <a href="${softHref}" class="vanish__btn-soft btn btn--secondary">
                                ${cfg.softBtnText}
                            </a>
                        `;
                        vanishContent.appendChild(btnGroup);
                    }

                    vanishInput.addEventListener('input', () => {
                        const hasValue = vanishInput.value.trim().length > 0;
                        vanishBtn.classList.toggle('disabled', !hasValue);
                        vanishBtn.disabled = !hasValue;
                    });

                    vanishInput.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' && !e.shiftKey && !vanishBtn.disabled) {
                            e.preventDefault();
                            startVanishSequence();
                        }
                    });

                    vanishBtn.addEventListener('click', startVanishSequence);

                    async function startVanishSequence() {
                        if (cfg.toggles.hideTitleAfterSubmit) {
                            vanishTitle.classList.add('fade-out');
                        }
                        vanishSubtitle.classList.add('fade-out');
                        vanishCard.classList.add('fade-out');
                        vanishDisclaimer.classList.add('fade-out');

                        await delay(0);

                        vanishSubtitle.style.display = "none";
                        vanishCard.style.display = "none";
                        vanishDisclaimer.style.display = "none";
                        if (cfg.toggles.hideTitleAfterSubmit) {
                            vanishTitle.style.display = "none";
                        }

                        if (cfg.toggles.showMsg1) {
                            await updateTextSequence(cfg.msg1, cfg.durations.msg1);
                        }
                        if (cfg.toggles.showMsg2) {
                            await updateTextSequence(cfg.msg2, cfg.durations.msg2);
                        }
                        if (cfg.toggles.showMsg3) {
                            await updateTextSequence(cfg.msg3, cfg.durations.msg3);
                        }

                        if (cfg.toggles.showFinalQuote) {
                            showFinalScreen();
                        } else if (cfg.toggles.showFinalButtons && btnGroup) {
                            setTimeout(() => {
                                btnGroup.classList.add('show');
                            }, cfg.durations.finalButtonsDelay);
                        }
                    }

                    async function updateTextSequence(newText, duration) {
                        if (messageEl.innerText !== "") {
                            messageEl.classList.remove('fade-in');
                            messageEl.classList.add('fade-out');
                            await delay(cfg.durations.fadeOut);
                        }

                        textStep++;

                        const prevStepClass = `vanish__title--${textStep - 1}`;
                        if (!cfg.toggles.hideTitleAfterSubmit) {
                            vanishTitle.classList.remove(prevStepClass);
                            vanishTitle.classList.add(`vanish__title--${textStep}`);
                        }

                        messageEl.innerText = newText;
                        messageEl.classList.remove('fade-out');
                        void messageEl.offsetWidth;
                        messageEl.classList.add('fade-in');

                        await delay(duration);
                    }

                    async function showFinalScreen() {
                        messageEl.classList.remove('fade-in');
                        messageEl.classList.add('fade-out');
                        await delay(cfg.durations.fadeOut);

                        textStep++;
                        const prevStepClass = `vanish__title--${textStep - 1}`;
                        if (!cfg.toggles.hideTitleAfterSubmit) {
                            vanishTitle.classList.remove(prevStepClass);
                            vanishTitle.classList.add(`vanish__title--${textStep}`);
                        }

                        messageEl.innerText = cfg.finalQuote;
                        messageEl.classList.remove('fade-out');
                        void messageEl.offsetWidth;
                        messageEl.classList.add('fade-in');

                        if (cfg.toggles.showFinalButtons && btnGroup) {
                            setTimeout(() => {
                                btnGroup.classList.add('show');
                            }, cfg.durations.finalButtonsDelay);
                        }
                    }

                    function delay(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }
                });
             </script>
        <?php
    }
} 
$widgets_manager->register(new vanish_2());
