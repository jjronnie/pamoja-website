<div class="bg-white rounded-xl shadow-2xl p-6 md:p-8" x-data="{ submitting: false }">
    <form id="contactForm" @submit.prevent="submitting = true; submitForm($event)">
        @csrf

        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Full Name</label>
                <input name="name" type="text" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Email Address</label>
                <input name="email" type="email" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Phone Number</label>
                <input name="phone" type="tel"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Service Needed</label>
               <select name="service" required
    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base">
    <option value="" selected disabled ="">Select Service</option>
    <option value="debt_collection">Debt Collection</option>
    <option value="court_bailiffs">Court Bailiffs</option>
    <option value="property_sales">Property Sales</option>
    <option value="legal_consultants">Legal Consultants</option>
    <option value="commission_agents">Commission Agents</option>
    <option value="auctioneering">Auctioneering</option>
    <option value="other">Other</option>
</select>

            </div>
        </div>

        <div class="mb-4 md:mb-6">
            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Message</label>
            <textarea name="message" rows="5"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-900 text-sm md:text-base"
                placeholder="Tell us more about what you need..."></textarea>
        </div>

        <div class="mb-4 text-center">
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
        </div>

        <div id="formAlert" class="hidden text-center text-sm mb-4"></div>

        <button type="submit"
            class="w-full bg-red-900 text-white py-3 md:py-4 rounded-lg hover:bg-red-800 transition font-semibold text-base md:text-lg"
            :disabled="submitting"
            x-text="submitting ? 'Submitting…' : 'Send Message'">
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
async function submitForm(e) {
    const form = e.target;
    const alertBox = document.querySelector('#formAlert');
    const formData = new FormData(form);

    alertBox.classList.remove('hidden', 'text-red-600', 'text-green-600');
    alertBox.textContent = 'Sending...';

    try {
        const response = await fetch("{{ route('contact.send') }}", {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': form.querySelector('[name=_token]').value },
            body: formData
        });

        const data = await response.json();

        if (response.ok) {
            alertBox.classList.add('text-green-600');
            alertBox.textContent = data.success;
            form.reset();
            grecaptcha.reset();
        } else {
            alertBox.classList.add('text-red-600');
            alertBox.textContent = data.error || 'An error occurred. Please try again.';
        }
    } catch (error) {
        alertBox.classList.add('text-red-600');
        alertBox.textContent = 'Something went wrong. Try again.';
    } finally {
        document.querySelector('[x-data]').__x.$data.submitting = false;
    }
}
</script>
