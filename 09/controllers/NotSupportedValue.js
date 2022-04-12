class NotSupportedValue extends Error {
  constructor(contentType) {
    super(`Content-Type ${contentType} not supported`);	
    this.name = 'NotSupportedValue';
    this.id = 3 
  }
}

module.exports = NotSupportedValue 