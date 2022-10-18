<div class="main-popup zoho-questions-popup js-zoho-questions-popup">

    <div class="main-popup__inner zoho-questions-popup__inner">
        <button class="main-popup__close-btn js-zoho-questions-popup-close-btn" id="conversation-popup-close"></button>

        <div class="zoho-questions-popup__questions-block">
            <h2 class="zoho-questions-popup__title">Please help us to process your request by answering 3 quick
                questions</h2>

            <div class="form-item">
                <label class="form-item__label" for="budget">What is your estimated budget for the project?<span class="required"></span></label>
                <div class="form-option-wrap custom-select js-budget">
                    <select id="budget">
                        <option value="decision-1">Not chosen</option>
                        <option value="budget-1">$1,000-5,000</option>
                        <option value="budget-2">$5,000-30,000</option>
                        <option value="budget-3">$30,000-100,000</option>
                        <option value="budget-4">$100,000+</option>
                        <option value="budget-5">Not Defined Yet</option>
                    </select>
                </div>
                <span class="not-valid-tip" aria-hidden="true">The field is required.</span>
            </div>

            <div class="form-item">
                <label class="form-item__label" for="decision">Who owns the decision?<span class="required"></span></label>
                <div class="form-option-wrap custom-select js-decision">
                    <select id="decision">
                        <option value="decision-0">Not chosen</option>
                        <option value="decision-1">I make the final decision</option>
                        <option value="decision-2">Someone else</option>
                        <option value="decision-3">Shared decision with me</option>
                    </select>
                </div>
                <span class="not-valid-tip" aria-hidden="true">The field is required.</span>
            </div>

            <div class="form-item">
                <label class="form-item__label" for="delivery">How urgent is the project delivery?<span class="required"></span></label>
                <div class="form-option-wrap custom-select js-delivery">
                    <select id="delivery">
                        <option value="delivery-0">Not chosen</option>
                        <option value="delivery-1">Just exploring</option>
                        <option value="delivery-2">Ready to start anytime</option>
                        <option value="delivery-3">Preferably start ASAP</option>
                    </select>
                </div>
                <span class="not-valid-tip" aria-hidden="true">The field is required.</span>
            </div>

            <div class="lead-id hidden" data-id="">ID</div>

            <div class="form-button-wrap">
                <button class="additional-info-submit wpcf7-submit" data-lead-email="" data-lead-name="">
                    Submit
                </button>
            </div>

            <div class="zoho-questions-popup__output js-zoho-output">
                <div class="zoho-questions-popup__output-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" fill="none">
                        <circle cx="60" cy="60" r="58" stroke="#F1563C" stroke-width="4" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                        <path d="M30 62.5L48 80.5L90 38.5" stroke="#F1563C" stroke-width="5" style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"><path>
                    </svg>
                </div>
                <p class="zoho-questions-popup__output-text">Thank you for </br>your reply!</p>
            </div>
        </div>

    </div>
</div>