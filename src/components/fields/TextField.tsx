import React from 'react';
import { useFormContext } from 'react-hook-form';
import { FieldConfig } from '../../lib/types';

interface TextFieldProps {
  config: FieldConfig;
}

export const TextField: React.FC<TextFieldProps> = ({ config }) => {
  const { register } = useFormContext();

  return (
    <div className="mb-4">
      <label className="block text-sm font-medium text-gray-700 mb-1">
        {config.label}
      </label>
      <input
        type="text"
        {...register(config.name, {
          required: config.required,
          pattern: config.validation?.pattern,
        })}
        placeholder={config.placeholder}
        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>
  );
};